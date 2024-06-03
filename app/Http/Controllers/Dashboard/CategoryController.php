<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function index()
    {
       

         $categories = Category::withCount([
            'items as service_count' => function ($query) {
                $query->where('item_type', 'service');
            },
            'items as product_count' => function ($query) {
                $query->where('item_type', 'product');
            }
        ])->paginate(15);
        /*
        $categories = Category::select([
            'categories.id',
            'categories.name',
            'categories.description',
            DB::raw('COUNT(items.id) as item_count'),
            DB::raw('COUNT(DISTINCT CASE WHEN items.item_type = "service" THEN items.id END) as service_count'),
            DB::raw('COUNT(DISTINCT CASE WHEN items.item_type = "product" THEN items.id END) as product_count')
        ])
        ->leftJoin('items', 'categories.id', '=', 'items.category_id')
        ->groupBy('categories.id', 'categories.name', 'categories.description')
        ->get();*/
        $category = Category::all();
        $totalCategories =  $category->count();

      
        return view('dashboard.categories.index', compact('category', 'totalCategories', 'categories' ));
    }

    public function showCreateCategory()
    {
        $user = auth()->user();
        $business_id = $user->businesses->first()->id;
        return view('dashboard.categories.category-create', compact('business_id'));
    }

    public function createCategory(Request $request)
    {
        $user = auth()->user();
        $business_id = $user->businesses->first()->id;

        $category_object = new Category();
        $category_created = $category_object->create([
            'business_id' => $business_id,
            'name' => ($request->name == '') ? null : $request->name,
            'description' => ($request->description == '') ? null : $request->description,
        ]);
        if ($category_created) {

            Alert::success('', 'Category created successfully.');
            return view('dashboard.categories.category-create' );

        } 
        
    }
    public function showUpdateCategory($id)
    {

        $category = Category::findOrFail($id);
        return view('dashboard.categories.categories-update', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
     $update = Category::findorFail($id);
     $update->name = $request->input('name');
     $update->description = $request->input('description');
     $update->save();
     return redirect()->route('dashboard.category')->with('success', 'Category updated successfully') ;     
       
    }
    public function deleteCategory($id)
    {
        
        $categories = Category::withCount([
            'items as service_count' => function ($query) {
                $query->where('item_type', 'service');
            },
            'items as product_count' => function ($query) {
                $query->where('item_type', 'product');
            }
        ])->paginate(15);
        $category = Category::all();
        $totalCategories =  $category->count();
        $category = Category::find($id);

    if ($category) {
        $category->delete();
        return redirect()->route('dashboard.category');
    }
    return view('dashboard.categories.index', compact('category', 'totalCategories', 'categories'));
}
       
    }


