<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function index() {
        if(Auth::check()) {
            $role = Role::find(Auth::user()->role_id);
            return redirect($role->name.'/dashboard');
        } else {
            return redirect('login');
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    function authenticate(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if(isset($user)) {
            $status = $user->status;
            if(Hash::check($request->input('password'), $user->password)) {
                if($user->status == 1) {
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        return redirect('/');
                    }
                } else {
                    session()->flash('message', 'Your Account is Inactive');
                    return redirect("login");
                }
            }
        } else {
            session()->flash('message', 'Wrong Credentials');
            return redirect("login");
        }
    }
}
