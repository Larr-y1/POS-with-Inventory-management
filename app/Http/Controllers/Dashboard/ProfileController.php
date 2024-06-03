<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //
    public function dashboardProfile()
    {
        $profiles = User::all();
        return view('dashboard.profile.index', compact( 'profiles'));
    }
    public function updateDashboardProfile(Request $request, $id)
    {
        $profiles = User::all();
        $profile = User::findorFail($id);
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->phone_number = $request->input('phone_number');
        $profile->email = $request->input('email');
        $profile->gender = $request->input('gender');
        $profile->national_id = $request->input('national_id');
        $profile->date_of_birth = $request->input('date_of_birth');
        $profile->save();

        
        Alert::success('', 'Profile updated successfully.');
        return view('dashboard.profile.index', compact('profiles'));
    }
}
