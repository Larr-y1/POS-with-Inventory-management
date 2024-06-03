<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Customer;
use App\Models\SaleItem;
use App\Models\ItemStockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;

class SalesController extends Controller
{
    //
    public function index(Request $request) {
        $item = DB::table('items')
        ->join('categories', 'items.category_id','=', 'categories.id')
        ->select('items.*', 'categories' . '.name as categoryName')->get();
        $customers = Customer::all();
        $categories = Category::all();

        $pendingSales = Sale::where('payment_status', 'pending')->paginate(6);
       
        return view('dashboard.sales.index', compact('item', 'customers', 'categories', 'pendingSales'));
    }

    public function saleHistory()
    {
        $sales = Sale::all();
        return view('dashboard.sales.sales-history', compact( 'sales'));
    }
    public function completeSale(){
        $item = DB::table('items')
        ->join('categories', 'items.category_id','=', 'categories.id')
        ->select('items.*', 'categories' . '.name as categoryName')->get();
        $customers = Customer::all();
        $categories = Category::all();
       
        return view('dashboard.sales.complete-sale', compact('item', 'customers', 'categories'));  
    }
    public function createSaleDetails(Request $request){
        $item = DB::table('items')
        ->join('categories', 'items.category_id','=', 'categories.id')
        ->select('items.*', 'categories' . '.name as categoryName')->get();
        $customers = Customer::all();
        $categories = Category::all();
         
        $user_id = Auth::user();
        $business_id = $user_id->businesses->first()->id;
        $customer_id = $request->customer_id ?? null;
        $payment_reference = $request->payment_reference ?? "";
        $amount = $request->amount;
        $payment_method = $request->payment_method;
        $amount_received = $request->amount_received;
        $balance = $request->balance;
        $payment_status = $request->payment_status;

        $milliseconds = "RCT" . round(microtime(true) * 1000);
        $sale_created = Sale::create([
            'receipt_no' => $milliseconds,
            'business_id' => $business_id,
            'customer_id' => $customer_id,
            'user_id' => $user_id->id,
            'amount' => $amount,
            'amount_received' => $amount_received,
            'balance' => $balance,
            'payment_method' => $payment_method,
            'payment_status' => $payment_status,
            'payment_reference' => $payment_reference,
            'notes' => $request->notes,
        ]);
        if ($sale_created) {
            $items = $request->items;
            $sale_items = Cart::content();

            foreach ($sale_items as $sale_item) {
                $item_id = $sale_item->id;
                $quantity = $sale_item->qty;
                $total_amount =  $sale_item->total;

                

                $margin = 0;
                $item = Item::query()
                    ->where('id', $item_id)
                    ->whereNull('deleted_at')
                    ->first();

                if ($item) {
                    $margin = $item->selling_price - $item->purchase_price;
                }

                $sale_item_created = SaleItem::create([
                    'sales_id' => $sale_created->id,
                    'item_id' => $item_id,
                    'price' => $sale_item->price,
                    'margin' => $margin,
                    'quantity' => $quantity,
                    'total_amount' => $total_amount,
                    
                ]);

                if ($sale_item_created) {
                    if ($item->item_type == 'product') {
                        $price = $item->purchase_price;
                        $total_amount = $item->purchase_price * $quantity;

                        ItemStockLog::create([
                            'business_id' => $business_id,
                            'item_id' => $item_id,
                            'quantity' => $quantity,
                            'user_id' => $user_id->id,
                            'reference_id' => $sale_item_created->id,
                            'transaction_type' => 'sale',
                            'price' => $price,
                            'total_amount' => $total_amount,
                        ]);

                        $new_quantity = $item->quantity - $quantity;
                        Item::query()
                            ->where('id', $item_id)
                            ->update([
                                'quantity' => $new_quantity,
                                'updated_at' => now(),
                            ]);
                    }
                }
            }

            $total_sales_cost = 0;
            $total_sales_profit = 0;

            $sale_items = SaleItem::query()
                ->where('sales_id', $sale_created->id)
                ->get();

            foreach ($sale_items as $sale_item) {
                $item = Item::query()
                    ->where('id', $sale_item->item_id)
                    ->first();

                if ($item) {
                    $total_sales_cost += $item->purchase_price * $sale_item->quantity;
                    $profit = ($sale_item->price * $sale_item->quantity) - ($item->purchase_price * $sale_item->quantity);
                    $total_sales_profit += $profit;
                }
            }

            Sale::query()
                ->where('id', $sale_created->id)
                ->update([
                    'total_sales_cost' => $total_sales_cost,
                    'total_sales_profit' => $total_sales_profit,
                    'updated_at' => now(),
                ]);


           
                Alert::success('', 'Sale completed successfully.');
                return view('dashboard.sales.complete-sale', compact('item', 'customers', 'categories'));  

    }
}
}