<?php

namespace App\Http\Controllers\Auth;


use Carbon\Carbon;
use App\Models\User;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Models\UserLogActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardLoginController extends Controller
{
    
    public function __construct()
    {
    $this->middleware('guest:web', ['except' => ['logout']]);
}

protected $providers = [
    'facebook', 'google'
];

public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only(['email', 'password']);
    $remember_me = $request->remember;
    $auth = auth()->guard('web')->attempt($credentials,  $this->toBoolean($remember_me));

    if ($auth) {

        $user = User::query()->where('email', $request->email)->first();
        $token = $user->createToken('SingleCart')->plainTextToken;
        $user->update([
            'api_token' => $token
        ]);

        // Get User-Agent details
        $agent = new Agent();
        $device = $agent->isDesktop();
        $browser = $agent->browser();
        $platform = $agent->platform();

    // Log user activity into user_log_activities table
    UserLogActivity::create([
        'user_id' => $user->id,
        'device' => $device ?: 'Unknown Device',
        'browser' => $browser ?: 'Unknown Browser',
        'platform' => $platform ?: 'Unknown Platform',
        'login_at' => Carbon::now(),
    ]);
        

            if(Auth::user()->business_id === null){
                return redirect('/dashboard/business-choose');
            }else {
                return redirect('/dashboard');
            }
    }
    toastr()->error('Oops! Wrong username or password!', 'Oops!', ['timeOut' => 2000]);
    return redirect()->back()->withInput($request->only(['email', 'remember']));
}
public function logout()
{
    Auth::guard('web')->logout();
    Session::flush();
    return redirect('/');
}

public function toBoolean($value)
{
    return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
}

protected function authenticated(Request $request, $user)
{
    // Get User-Agent details
    $agent = new Agent();
    $agent->setUserAgent($request->header('User-Agent'));

    $device = $agent->device();
    $browser = $agent->browser();
    $platform = $agent->platform();

    // Update user's last login device, browser, platform, and time
    $user->update([
        'last_login_device' => $device ?: 'Unknown Device',
        'last_login_browser' => $browser ?: 'Unknown Browser',
        'last_login_platform' => $platform ?: 'Unknown Platform',
        'last_login_at' => Carbon::now(),
    ]);

    // Log user activity into user_log_activities table
    UserLogActivity::create([
        'user_id' => $user->id,
        'device' => $device ?: 'Unknown Device',
        'browser' => $browser ?: 'Unknown Browser',
        'platform' => $platform ?: 'Unknown Platform',
        'login_at' => Carbon::now(),
    ]);

    return redirect()->intended($this->redirectPath());
}
}




    
    


       
       
        


  
 
    


