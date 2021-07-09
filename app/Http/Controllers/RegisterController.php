<?php

namespace App\Http\Controllers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



use Illuminate\Auth\Events\Verified; 

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:4|max:255',

        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        event(new Registered($user));

        return redirect('/login')->with('success', 'Your account has been created. Kindly check your mail to verify your account.');
        // return redirect('/email/verify')->with('success', 'Your account has been created. Kindly check your mail to verify your account.');
    }
    public function verify() {
        return view('auth.verify-email');
    }
    // public function emailVerified(EmailVerificationRequest $request) {
    //  Have to login before verifcation
    //     $request->fulfill();
    //     return redirect('/');
    // }
    public function emailVerified(Request $request) {
        $user = User::find($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->markEmailAsVerified())
            event(new Verified($user));

        return redirect('/login')->with('verification_msg', 'Account successfully verified. Kindly login.');

    }   
    public function verifyResend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    } 
}
