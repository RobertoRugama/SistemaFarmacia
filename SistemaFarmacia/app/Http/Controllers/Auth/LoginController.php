<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirecTo(){
        return route('admin');
    }
    public function Logout(Request $request){
         $this->guard()->logout();
         $request ->session()->invalidate();
         return redirect()->route('login');

         //dd($request);
    }
}
