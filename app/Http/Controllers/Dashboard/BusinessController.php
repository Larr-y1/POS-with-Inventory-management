<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function showCreateBusiness()
    {
        return view('dashboard.business.business-create');
    }

    public function createBusiness(Request $request){
        $request->validate([
            'name'=>'required',
            'phone_number'=>'required', 
            'email'=>'required|email|unique:users',
           ]);

        $user = auth()->user();
        $business_object = new Business();
        $business_created = $business_object->create([
            'user_id' => $user->id,
            'name' => ($request->name == '') ? null : $request->name,
            'description' => ($request->description == '') ? null : $request->description,
            'phone_number' => ($request->phone_number == '') ? null : $request->phone_number,
            'email' => ($request->email == '') ? null : $request->email,
            'website' => ($request->website == '') ? null : $request->website,
            'address' => ($request->address == '') ? null : $request->address,
            'business_industry' => $request->business_industry,
        ]);

        if($business_created){
            toastr()->success('Business has been created successfully!', 'Congrats', ['timeOut' => 2000]);
            return redirect()->intended(route('dashboard.home'));
        }
        else{
            toastr()->error('Oops! Failed to create Business!', 'Oops!', ['timeOut' => 2000]);
            return redirect()->route('dashboard.business-create')->with('message', 'Failed to create business');
        }
    }

    public function businessChoose(Request $request)
    {
        if ($request->session()->has('business_id')) {
            Session::forget('business_id');
        }

        $businesses = Business::query()->where('user_id', Auth::user()->id)->get();
        $data = [
            'businesses' => $businesses,
        ];
        return view('dashboard.business.business-choose', $data);
    }
    
    public function businessUpdateSession(Request $request)
    {
        session(['business_id' => $request->business_id]);
        toastr()->success('You are Logged in successfully!', 'Congrats', ['timeOut' => 2000]);
        return redirect('/dashboard');
    }
    public function showUpdateBusinessList(){
        $businesses = Business::all();
        return view('dashboard.business.business-edit', compact('businesses'));

    }
    public function updateBusinessList(Request $request, $id)
    {
        $businesses = Business::all();
        $business = Business::findorFail($id);
        $business->name = $request->input('name');
        $business->description = $request->input('description');
        $business->phone_number = $request->input('phone_number');
        $business->email = $request->input('email');
        $business->address = $request->input('address');
        $business->website = $request->input('website');
        $business->save();
        Alert::success('', 'Business updated successfully.');
        return view('dashboard.business.business-edit', compact('businesses'));
    }
 


}
