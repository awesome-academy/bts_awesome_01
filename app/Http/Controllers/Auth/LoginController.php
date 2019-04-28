<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }
    
    public function handleLogin(loginRequest $request)
    {
        try {
            $auth = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (Auth::attempt($auth) && Auth::user()->role == config('setting.role.admin')) return response()->json([
                'message' => 'Login success',
                'isAdmin' => '1',
            ], 200);
            if (Auth::attempt($auth) && Auth::user()->role == config('setting.role.user')) return response()->json([
                'message' => 'Login success'
            ], 200);
            return response()->json([
                'error' => 'invalid_credentials',
                'message' => 'User not found',
            ], 401);
        } catch (Exception $e) {
            \Log::error('error-login', $e);
        }
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/');
    }
}
