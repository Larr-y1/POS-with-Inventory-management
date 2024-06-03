<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\Sale;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        $totalSales = Sale::sum('amount');
        $items = Item::latest()->take(5)->get();
        $item = Item::all();
        $totalLowStockCount = $item->where('low_stock_count', '>', 3)->count();
        $pendingExpensesCount = Expense::where('status', 'pending')->count();

        return view('dashboard.index', compact('items', 'totalLowStockCount',  'pendingExpensesCount', 'totalSales'));
    }
}