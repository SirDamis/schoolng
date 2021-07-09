<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }
     public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'error_message' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy(){
        session()->flush();
        auth()->logout();

        return redirect('/login')->with('success', 'Goodbye!');
    }

    public function forgotPasswordRequest(){
        return view('auth.forgot-password');
    }
    public function forgotPasswordRetrieve(Request $request){
        request()->validate(['email' => 'required|email']);

        $user = User::whereEmail($request->email)->first();
        if($user == null){
             return redirect()->back()->with('errormsg', 'Email is not registered, Kindly register!');   
        }
        else{
            $status = Password::sendResetLink($request->only('email'));

            return $status === Password::RESET_LINK_SENT
                        ? back()->with(['status' => __($status), 'msg'=>'Password reset link sent.'])
                        : back()->withErrors(['email' => __($status), 'errormsg'=>'Unable to send password reset link.']);
                }
    }


    public function passwordReset($token) {
        return view('auth.reset-password', ['token' => $token]);
    }


    
    public function passwordUpdate(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:4|max:255',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with(['status', __($status), 'update_msg'=>'Password update successful. Kindly login'])
                    : back()->with(['email' => [__($status)], 'errormsg'=>'Password update not successful. Kindly request for new link or check your email.']);
    }
}
