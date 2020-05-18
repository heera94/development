<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Redirect;
use Illuminate\Support\MessageBag;

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
    protected $redirectTo = '/home';
    protected $maxLoginAttempts = 2; // Amount of bad attempts user can make
    protected $lockoutTime = 100; // Time for which user is going to be blocked in seconds

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {

      $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
      
      ],
      [
        'email.required' => 'The email field is required.',
        'password.required' => 'The password field is required.'
      ]);

      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
          return redirect()->intended('home');
      }

      $errors = new MessageBag(['email' => ['These credentials do not match our records.']]);
      return Redirect::back()->withErrors($errors);

    }



    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
