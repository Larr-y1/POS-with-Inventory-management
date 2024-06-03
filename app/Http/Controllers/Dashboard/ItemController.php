<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    //
    public function index(Request $request)
    {
        
        $item = Item::all();
        $categories = Category::all();
        $itemCategories = $categories->count();
        $items = Item::paginate(10);
        $totalItems =  $item->count();
        $totalLowStockCount = $item->where('low_stock_count', '>', 5)->count();
        $totalPurchasePrice = $item->sum('purchase_price');
        return view('dashboard.items.index', compact('item', 'items', 'totalItems', 'totalLowStockCount', 'totalPurchasePrice', 'categories', 'itemCategories'));
    }

    public function showCreateItem()
    {
        $categories = Category::all();
        $user = auth()->user();
        $business_id = $user->businesses->first()->id;
        return view('dashboard.items.item-create', compact('business_id', 'user', 'categories'));
    }
    public function createItem(Request $request)
    {
        $categories = Category::all();
        $user = Auth::user();
        $business = $user->businesses->first();
       
        $image_path = null;
        if ($request->hasFile('image')) {
            Storage::disk('public');
        }
            $path = $request->file('image')->store('storage', 'public');
            $image_path = $path;

           
            
        
        $track_inventory = false;
            if($request->track_inventory == "true" || $request->track_inventory == 1){
                $track_inventory = true;
            }

            $enabled = false;
            if($request->enabled == "true" || $request->enabled == 1){
                $enabled = true;
            }

            $item_object = new Item();
            $item_created = $item_object->create([
                'business_id' => $business->id,
                'category_id' => ($request->category_id == '') ? null : $request->category_id,
                'item_type' => ($request->item_type == '') ? null : $request->item_type,
                'name' => ($request->name == '') ? null : $request->name,
                'purchase_price' => ($request->purchase_price == '') ? 0 : $request->purchase_price,
                'selling_price' => ($request->selling_price == '') ? 0 : $request->selling_price,
                'track_inventory' => $track_inventory,
                'sku' => ($request->sku == '') ? null : $request->sku,
                'quantity' => ($request->quantity == '') ? 0 : $request->quantity,
                'low_stock_count' => ($request->low_stock_count == '') ? 0 : $request->low_stock_count,
                'barcode' => ($request->barcode == '') ? null : $request->barcode,
                'user_id' => $user->id,
               /* 'user_id' => ($request->user_id == '') ? null : $request->user_id,*/
                'image' =>  $image_path,
                'enabled' => $enabled,
            ]);
            if ($item_created) {

                Alert::success('', 'Item created successfully.');
                return view('dashboard.items.item-create', compact('categories'));
   
            } 

    }
    public function showUpdateItem($id)
    {
        $categories = Category::all();
        $item = Item::findOrFail($id);
        return view('dashboard.items.item-update', compact('item', 'categories'));
    }
    public function updateItem(Request $request, $id)
   {
    if ($request->hasFile('image')) {
        $path = $request->file('image')->storePublicly('Storage', 'public');
        Storage::disk('public');
        $image_path = $path;
    }
    $track_inventory = false;
        if($request->track_inventory == "true" || $request->track_inventory == 1){
            $track_inventory = true;
        }

        $enabled = false;
        if($request->enabled == "true" || $request->enabled == 1){
            $enabled = true;
        }
    
   
    /*$item= Item::findorFail($id);
    $item->barcode = $request->input('barcode');
    $item->item_type = $request->input('item_type');
    $item->name = $request->input('name');
    $item->sku = $request->input('sku');
    $item->quantity = $request->input('quantity');
    $item->category_id = $request->input('category_id');
    $item->purchase_price = $request->input('purchase_price');
    $item->selling_price = $request->input('selling_price');
    $item->low_stock_count = $request->input('low_stock_count');
    $item->image = $image_path;
    $item->enabled =  $enabled;
    $item->track_inventory = $track_inventory;
    $item->save();
    return redirect()->route('dashboard.item')->with('success', 'Item updated successfully') ;     
   }*/
   $item = Item::query()
   ->where('id', $request->id)
   ->update([
       'category_id' => ($request->category_id == '') ? null : $request->category_id,
       'item_type' => ($request->item_type == '') ? null : $request->item_type,
       'name' => ($request->name == '') ? null : $request->name,
       'purchase_price' => ($request->purchase_price == '') ? 0 : $request->purchase_price,
       'selling_price' => ($request->selling_price == '') ? 0 : $request->selling_price,
       'track_inventory' => $track_inventory,
       'sku' => ($request->sku == '') ? null : $request->sku,
       'quantity' => ($request->quantity == '') ? 0 : $request->quantity,
       'low_stock_count' => ($request->low_stock_count == '') ? 0 : $request->low_stock_count,
       'barcode' => ($request->barcode == '') ? null : $request->barcode,
       'image' => $image_path,
       'enabled' => $enabled,
       'updated_at' => date('Y-m-d H:i:s'),
   ]);
   if ($item) {
    return redirect()->route('dashboard.item')->with('success', 'Item updated successfully') ;     
}
}
public function deleteItem($id){
    $item = Item::findOrFail($id);
    if($item){
        $item->delete();
        return redirect()->route('dashboard.item');
    }
    return view('dashboard.items.index');
}
}