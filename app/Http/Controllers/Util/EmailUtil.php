<?php

namespace App\Http\Controllers\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailUtil extends Controller
{
    //
    public function userWelcomeEmail($name, $email, $password){

        $data = array(
            'email'=>$email,
            'password'=>$password,
            'name'=>$name,
        );

        Mail::send('email.user-welcome-note', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('User Welcome Note - SingleCart');
            $message->from('system@SingleCart.com','User Welcome Note - SingleCart');
        });
    }

    public function userVerificationCode($name, $email, $verification_code){

        $data = array(
            'email'=>$email,
            'verification_code'=>$verification_code,
            'name'=>$name,
        );

        Mail::send('email.verification-code', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Verification Code - SingleCart');
            $message->from('system@SingleCart.com','Verification Code- SingleCart');
        });
    }
}
