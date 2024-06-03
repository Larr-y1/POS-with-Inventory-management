<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ExpenseController extends Controller
{
    //
    public function index()
    {
        /* Get current month and year*/
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Calculate start and end dates of the current month
        $startOfMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->startOfMonth();
        $endOfMonth = Carbon::createFromDate($currentYear, $currentMonth, 1)->endOfMonth();

        // Get total expenses for the month
        $monthlyExpenses = Expense::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
       
        
        $expense = Expense::all();
        $totalExpenses = $expense->count();
        $paidExpenses = $expense->where('status', 'paid')->count();
        $pendingExpenses = $expense->where('status', 'pending')->count();

        $expenses = Expense::paginate(10);
         return view('dashboard.expenses.index', compact( 'monthlyExpenses', 'totalExpenses', 'paidExpenses', 'pendingExpenses', 'expenses'));
    }

    public function showCreateExpenses()
    {
        return view('dashboard.expenses.expenses-create');
    }
    public function createExpenses(Request $request)
    {
            $user = auth()->user();
            $business_id = $user->businesses->first()->id;
            $expense_type = $request->expense_type;
            $enable_due_date = $request->enable_due_date === 'true' || $request->enable_due_date === 1;

            $expense_object = new Expense();
            $expense_created = $expense_object->create([
                'business_id' => $business_id,
                'user_id' => $user->id,
                'expense_type' => $expense_type,
                'payment_method' =>  $request->payment_method,
                'amount' => ($request->amount == '') ? 0 : $request->amount,
                'beneficiary' => ($request->beneficiary == '') ? null : $request->beneficiary,
                'enable_due_date' => $enable_due_date,
                'due_date' => ($request->due_date == '') ? null : $request->due_date,
                'status' => $request->status,
            ]);
            if($expense_created){
                Alert::success('', 'Expense created successfully.');
                return view('dashboard.expenses.expenses-create');
   
        }


    }
    public function showUpdateExpense($id)
    {
        $expense = Expense::findOrFail($id);
        return view('dashboard.expenses.expenses-update', compact('expense'));
    }

    public function updateExpense(Request $request, $id)
    {
     $expenses = Expense::findOrFail($id);
     $expenses->expense_type = $request->input('expense_type');
     $expenses->payment_method = $request->input('payment_method');
     $expenses->amount = $request->input('amount');
     $expenses->beneficiary = $request->input('beneficiary');
     $expenses->status = $request->input('status');
     $expenses->save();
       
     return redirect()->route('dashboard.expenses')->with('success', 'Expense updated successfully');


    }
    public function deleteExpense($id){
        $expense = Expense::findOrFail($id);
        if($expense){
            $expense->delete();
            return redirect()->route('dashboard.expenses');
        }
        return view('dashboard.expenses.index');
    }


}