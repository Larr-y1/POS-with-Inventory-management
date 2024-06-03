<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BusinessController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Auth\DashboardLoginController;
use App\Http\Controllers\Auth\DashboardRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('website/home');
})->name('home');
Route::get('/home', function () {
    return view('website/home');
});

Route::prefix('dashboard')->group(function () {
Route::get('/', [\App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('dashboard.home');
Route::get('/login', [\App\Http\Controllers\Auth\DashboardLoginController::class, 'showLoginForm'])->name('dashboard.login');
Route::post('/login', [\App\Http\Controllers\Auth\DashboardLoginController::class, 'login'])->name('dashboard.login.submit');
Route::get('/logout',[\App\Http\Controllers\Auth\DashboardLoginController::class, 'logout'])->name('dashboard.logout');

Route::get('/register', [\App\Http\Controllers\Auth\DashboardRegisterController::class, 'showRegisterForm'])->name('dashboard.register');
Route::post('/register', [\App\Http\Controllers\Auth\DashboardRegisterController::class, 'register'])->name('dashboard.register.submit');

Route::get('/profile', [\App\Http\Controllers\Dashboard\ProfileController::class, 'dashboardProfile'])->name('dashboard.profile');
Route::put('/profile{id}', [\App\Http\Controllers\Dashboard\ProfileController::class, 'updateDashboardProfile'])->name('dashboard.profile.update');


Route::get('/business-create', [\App\Http\Controllers\Dashboard\BusinessController::class, 'showCreateBusiness'])->name('dashboard.business-create');
Route::post('/business-create', [\App\Http\Controllers\Dashboard\BusinessController::class, 'createBusiness'])->name('dashboard.business-create.submit');
Route::get('/business-choose', [\App\Http\Controllers\Dashboard\BusinessController::class, 'businessChoose'])->name('dashboard.business-choose');
Route::post('/business-session', [\App\Http\Controllers\Dashboard\BusinessController::class, 'businessUpdateSession'])->name('dashboard.business-session');
Route::get('/business-update', [\App\Http\Controllers\Dashboard\BusinessController::class, 'showUpdateBusinessList'])->name('dashboard.business-update');
Route::put('/business-update{id}', [\App\Http\Controllers\Dashboard\BusinessController::class, 'UpdateBusinessList'])->name('dashboard.business-update.submit');


Route::get('/sale', [\App\Http\Controllers\Dashboard\SalesController::class, 'index'])->name('dashboard.sales');
Route::get('/complete-sale', [\App\Http\Controllers\Dashboard\SalesController::class, 'completeSale'])->name('dashboard.sales-complete');
Route::post('/sale-create', [\App\Http\Controllers\Dashboard\SalesController::class, 'createSaleDetails'])->name('dashboard.sales-create');
Route::get('/sale-history', [\App\Http\Controllers\Dashboard\SalesController::class, 'saleHistory'])->name('dashboard.sale_history');

Route::get('/items', [\App\Http\Controllers\Dashboard\ItemController::class, 'index'])->name('dashboard.item');
Route::get('/items-create', [\App\Http\Controllers\Dashboard\ItemController::class, 'showCreateItem'])->name('dashboard.item-create');
Route::post('/items-create', [\App\Http\Controllers\Dashboard\ItemController::class, 'createItem'])->name('dashboard.item-create.submit');
Route::get('/items-update{id}', [\App\Http\Controllers\Dashboard\ItemController::class, 'showUpdateItem'])->name('dashboard.item-update');
Route::put('/items-update{id}', [\App\Http\Controllers\Dashboard\ItemController::class, 'updateItem'])->name('dashboard.item-update.submit');
Route::delete('/items-delete{id}',[App\Http\Controllers\Dashboard\ItemController::class,'deleteItem'])->name('dashboard.item-delete');

Route::get('/categories', [\App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('dashboard.category');
Route::get('/categories-create', [\App\Http\Controllers\Dashboard\CategoryController::class, 'showCreateCategory'])->name('dashboard.category-create');
Route::post('/categories-create', [\App\Http\Controllers\Dashboard\CategoryController::class, 'createCategory'])->name('dashboard.category-create.submit');
Route::get('/categories-update{id}', [\App\Http\Controllers\Dashboard\CategoryController::class, 'showUpdateCategory'])->name('dashboard.category-update');
Route::post('/categories-update{id}', [\App\Http\Controllers\Dashboard\CategoryController::class, 'updateCategory'])->name('dashboard.category-update.submit');
Route::delete('/categories-delete{id}',[App\Http\Controllers\Dashboard\CategoryController::class,'deleteCategory'])->name('dashboard.category-delete');


Route::get('/customers', [\App\Http\Controllers\Dashboard\CustomerController::class, 'index'])->name('dashboard.customers');
Route::get('/customers-create', [\App\Http\Controllers\Dashboard\CustomerController::class, 'showCreateCustomer'])->name('dashboard.customer-create');
Route::post('/customers-create', [\App\Http\Controllers\Dashboard\CustomerController::class, 'createCustomer'])->name('dashboard.customer-create.submit');
Route::get('/customers-update{id}', [\App\Http\Controllers\Dashboard\customerController::class, 'showUpdateCustomer'])->name('dashboard.customer-update');
Route::put('/customers-update{id}', [\App\Http\Controllers\Dashboard\CustomerController::class, 'updateCustomer'])->name('dashboard.customer-update.submit');
Route::delete('/customers-delete{id}',[App\Http\Controllers\Dashboard\CustomerController::class,'deleteCustomer'])->name('dashboard.customer-delete');


Route::get('/expenses', [\App\Http\Controllers\Dashboard\ExpenseController::class, 'index'])->name('dashboard.expenses');
Route::get('/expenses-create', [\App\Http\Controllers\Dashboard\ExpenseController::class, 'showCreateExpenses'])->name('dashboard.expenses-create');
Route::post('/expenses-create', [\App\Http\Controllers\Dashboard\ExpenseController::class, 'createExpenses'])->name('dashboard.expenses-create.submit');
Route::get('/expenses-update{id}', [\App\Http\Controllers\Dashboard\ExpenseController::class, 'showUpdateExpense'])->name('dashboard.expense-update');
Route::put('/expenses-update{id}', [\App\Http\Controllers\Dashboard\ExpenseController::class, 'updateExpense'])->name('dashboard.expense-update.submit');
Route::delete('/expenses-delete{id}',[App\Http\Controllers\Dashboard\ExpenseController::class,'deleteExpense'])->name('dashboard.expense-delete');
 
Route::get('/customers-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'customersReport'])->name('dashboard.customers-report');
Route::get('/expenses-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'expensesReport'])->name('dashboard.expenses-report');
Route::get('/stock-activity-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'reportStockActivity'])->name('dashboard.stock-activity-report');
Route::get('/purchases-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'reportPurchase'])->name('dashboard.purchases-report');
Route::get('/sales-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'salesReport'])->name('dashboard.sales-report');
Route::get('/sales-by-product-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'salesByProductReport'])->name('dashboard.sales-by-product-report');
Route::get('/stock-sheet-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'stockSheetReport'])->name('dashboard.stock-sheet-report');
Route::get('/current-stock-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'currentStockReport'])->name('dashboard.current-stock-report');
Route::get('/financial-report', [\App\Http\Controllers\Dashboard\ReportController::class, 'financialReport'])->name('dashboard.financial-report');

Route::post('/add-cart{id}', [\App\Http\Controllers\Dashboard\CartController::class, 'index'])->name('dashboard.carts');
Route::post('/cart-update{rowId}', [\App\Http\Controllers\Dashboard\CartController::class, 'updateCart'])->name('dashboard.carts.update');
Route::get('/cart-remove{rowId}', [\App\Http\Controllers\Dashboard\CartController::class, 'removeCart'])->name('dashboard.carts.remove');
Route::post('/clear-cart', [\App\Http\Controllers\Dashboard\CartController::class, 'clearCart'])->name('dashboard.carts-clear');






   














});