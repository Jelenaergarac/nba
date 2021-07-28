<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');

    }
    public function loginForm(){
        return view('auth.login');
    }
    
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        auth()->login($user);

        event(new Registered($user));

        $user->notify(new WelcomeEmailNotification());

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (auth()->attempt($credentials))
            return redirect('/');
        return back()->withErrors(['password' => 'Invalid password']);
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return back();
    }
    public function getEmailVerificationNotice()
    {
        return view('auth.emailvefirication');
    }
 
}
