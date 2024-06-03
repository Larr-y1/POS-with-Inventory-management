<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Expense;
use App\Models\Business;
use App\Models\Customer;
use App\Models\SaleItem;
use Nette\Schema\Expect;
use App\Models\ItemStockLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventoryOpeningClosingStock;
use Illuminate\Database\Eloquent\Builder;


class ReportController extends Controller
{
    //
    public function salesReport(){
        $totalSales = Sale::count();
        $sales = Sale::paginate(8);

        return view('dashboard.reports.sales-report', compact('sales', 'totalSales'));
    }

    public function salesByProductReport(){
     
        $totalSalesItem = SaleItem::count();
        $salesItems = SaleItem::paginate(8);
        return view('dashboard.reports.sales-by-product-report', compact('totalSalesItem', 'salesItems'));
    }
    public function customersReport()
    {
        $customers = Customer::paginate(15);
        $totalCustomers = Customer::all()->count();
        return view('dashboard.reports.customers-report', compact('customers', 'totalCustomers'));
    }

    public function expensesReport()
    {
        $expenses = Expense::paginate(15);
        $totalExpenses = Expense::all()->count();
        return view('dashboard.reports.expenses-report', compact('expenses', 'totalExpenses'));
    }
    public function financialReport(Request $request){
        $totalRevenue = Sale::sum('amount');
        

        $total_sales_cost = Sale::sum('total_sales_cost');
        $total_sales_profit = Sale::sum('total_sales_profit');
        $total_tax = Sale::sum('total_tax');
        $totalExpenses = Expense::sum('amount');
        $netIncome =  ($totalRevenue - $totalExpenses);


        return view('dashboard.reports.financial-report',compact('totalRevenue', 'total_sales_cost', 'total_sales_profit', 'totalExpenses', 'total_tax', 'netIncome'));

    }
    public function reportStockActivity(Request $request)
    {
    
         $stockActivities = ItemStockLog::paginate(8);
         $totalItems = ItemStockLog::count();
       
        return view('dashboard.reports.stock-activity-report', compact('stockActivities', 'totalItems'));

    }
    public function currentStockReport(){
         
        $item = Item::all();
        $items = Item::paginate(10);
        $totalItems =  $item->count();
        return view('dashboard.reports.current-stock-report', compact('items', 'totalItems'));
    }
    public function stocksheetReport(Request $request){
        
        $lowStockItems = Item::whereRaw('quantity < low_stock_count')->get();   
        return view('dashboard.reports.restock-sheet-report', compact('lowStockItems'));
    }
    public function reportPurchase(Request $request){
        
        return view('dashboard.reports.purchases-report');
    }


    public function reportPurchases(Request $request)
    {
            $business_id = $request->business_id;
            $date = $request->date;
            $custom_date = $request->custom_date;
            $custom_start_date = $request->custom_start_date;
            $custom_end_date = $request->custom_end_date;
            $user_id = $request->user_id;
            $item_id = $request->item_id;

            $business = Business::query()
                ->where('id', $business_id)
                ->first();

            

            $item_stock_logs = ItemStockLog::with(['business', 'item', 'user' => function ($query) {
                    $query->withTrashed();
                }])
                ->where('business_id', $business_id)
                ->where('transaction_type', 'purchase');

            if ($date != '') {

                if ($date == 'today') {

                    $item_stock_logs->whereDate('created_at', Carbon::today());

                } elseif ($date == 'current_week') {

                    $item_stock_logs->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);

                } elseif ($date == 'last_week') {

                    $previous_week = strtotime("-1 week +1 day");
                    $start_week = strtotime("last sunday midnight", $previous_week);
                    $end_week = strtotime("next saturday", $start_week);
                    $start_week = date("Y-m-d", $start_week);
                    $end_week = date("Y-m-d", $end_week);
                    $item_stock_logs->whereBetween('created_at', [$start_week, $end_week]);

                } elseif ($date == 'current_month') {

                    $item_stock_logs->whereMonth('created_at', Carbon::now()->month);
                    $item_stock_logs->whereYear('created_at', Carbon::now()->year);

                } elseif ($date == 'current_year') {

                    $item_stock_logs->whereMonth('created_at', Carbon::now()->month);
                    $item_stock_logs->whereYear('created_at', Carbon::now()->year);

                } elseif ($date == 'custom_date') {

                    $custom_date = date("Y-m-d", strtotime($custom_date));
                    $item_stock_logs->whereDate('created_at', '=', $custom_date);

                } elseif ($date == 'custom_range') {

                    $start_date = date("Y-m-d", strtotime($custom_start_date));
                    $end_date = date("Y-m-d", strtotime($custom_end_date));

                    $item_stock_logs->whereBetween('created_at', [$start_date, $end_date]);
                }

            }else{
                $item_stock_logs->whereMonth('created_at', Carbon::now()->month);
                $item_stock_logs->whereYear('created_at', Carbon::now()->year);
            }

            if ($item_id != '') {
                $item_stock_logs->where('item_id', $item_id);
            }

            if ($user_id != '') {
                $item_stock_logs->where('user_id', $user_id);
            }

            $item_stock_logs = $item_stock_logs->latest()->paginate(20);
            return view('dashboard.reports.purchases-report', compact('item_stock_logs'));
        }

    }



