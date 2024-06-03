<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $totalCustomers = Customer::count();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        // Customers of the week
        $customersOfWeek = Customer::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $totalCustomersOfWeek = $customersOfWeek->count();

        // Customers of the month
        $customersOfMonth = Customer::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $totalCustomersOfMonth = $customersOfMonth->count();

        // Customers of the year
        $customersOfYear = Customer::whereBetween('created_at', [$startOfYear, $endOfYear])->get();
        $totalCustomersOfYear = $customersOfYear->count();

        $customers = Customer::paginate(10);
        return view('dashboard.customers.index', compact('customers',  'totalCustomersOfWeek',  'totalCustomersOfMonth',  'totalCustomersOfYear', 'totalCustomers'));
    }
    public function showCreateCustomer()
    {
       
        return view('dashboard.customers.customer-create');
    }

    public function createCustomer(Request $request)
    {
        $user = auth()->user();
        $business_id = $user->businesses->first()->id;

        $customer_object = new Customer();
        $customer_created = $customer_object->create([
            'business_id' => $business_id,
            'first_name' => ($request->first_name == '') ? null : $request->first_name,
            'last_name' => ($request->last_name == '') ? null : $request->last_name,
            'phone_number' => ($request->phone_number == '') ? null : $request->phone_number,
            'email' => ($request->email == '') ? null : $request->email,
            'notes' => ($request->notes == '') ? null : $request->notes,
        ]);

        if ($customer_created) {

            Alert::success('', 'Customer created successfully.');
        return view('dashboard.customers.customer-create');
    }
   }
   public function showUpdateCustomer($id)
    {

        $customer = Customer::findOrFail($id);
        return view('dashboard.customers.customer-update', compact('customer'));
    }
   public function updateCustomer(Request $request, $id)
   {
   


    $customer= Customer::findorFail($id);
    $customer->first_name = $request->input('first_name');
    $customer->last_name = $request->input('last_name');
    $customer->phone_number = $request->input('phone_number');
    $customer->notes = $request->input('notes');
    $customer->save();
    return redirect()->route('dashboard.customers')->with('success', 'Customer updated successfully') ;     
   }
   public function deleteCustomer($id){
    $customer = Customer::findOrFail($id);
    if($customer){
        $customer->delete();
        return redirect()->route('dashboard.customers');
    }
    return view('dashboard.customers.index');
}
 
}