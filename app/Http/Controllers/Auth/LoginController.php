<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()  // put this code in the upper this code 

         {
         
             if(Auth::check() && Auth::user()->role->id == 1){
         
                          $this->redirectTo = route('admin.admindashboard');
         
             } else {
         
                 $this->redirectTo = route('user.userdashboard');
         
             }
         
             $this->middleware('guest')->except('logout');

          }
}
