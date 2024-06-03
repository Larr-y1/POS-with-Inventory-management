<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Util\EmailUtil;
use App\Http\Controllers\Util\PasswordGeneratorUtil;

class DashboardRegisterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware ('guest:web', ['except' => ['logout']]);
    }

    public function showRegisterForm(Request $request)
    {
        return View('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',

        ]);

        $email_address = $request->email;
        $email_check =  User::query()->where('email', $request->email)->first();
        if ($email_check) {
            return redirect()->back()->withInput($request->only('first_name', 'last_name', 'phone_number', 'email'))->with('message', 'Email address already exist');
        }

        $phone_number = $request->phone_number;
        $password = $request->password;
        $verification_token = rand(10000, 99999);

        $pin_generator = new PasswordGeneratorUtil();
        $pin = $pin_generator->generatePin();

        $user_object = new User();
        $user_created = $user_object->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $phone_number,
            'email' => $email_address,
            'verification_token' => $verification_token,
            'password' => bcrypt($password),
            'pin' => bcrypt($pin),
        ]);

        if ($user_created) {

            $email_util = new EmailUtil();
            $email_util->userWelcomeEmail($user_created->first_name, $user_created->email, $password, $pin);

            /*$email_util = new EmailUtil();
             $email_util->userVerificationCode($user_created->first_name, $user_created->email, $verification_token);*/

            if (Auth::guard('web')->attempt(['email' => $email_address, 'password' => $password], $request->remember)) {

                $user = User::query()->where('email', $user_created->email)->first();
                $token = $user->createToken('SingleCart')->plainTextToken;
                $user->update([
                    'api_token' => $token
                ]);

                toastr()->success('Registered  account successfully!', 'Congrats', ['timeOut' => 2000]);
                return redirect()->intended(route('dashboard.business-create'));
            }
        } else {
            toastr()->error('Oops! Failed to create Account!', 'Oops!', ['timeOut' => 2000]);
            return redirect()->back()->withInput($request->only('first_name', 'last_name', 'phone_number', 'email'));
        }
    }
}
