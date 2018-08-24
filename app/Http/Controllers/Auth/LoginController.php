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

    protected function authenticated()
    {
     $akses = Auth::user()->akses;
     $first_akses  = strtok($akses, ' ');
     $second_akses = strtok('');

        if ( Auth::user()->akses=='Admin') {// do your margic here
            return redirect('dashboard');
        }elseif ( Auth::user()->akses=='Users') {// do your margic here
            return redirect('user');
        }else{
            echo "kamu siapa (?) ";
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
