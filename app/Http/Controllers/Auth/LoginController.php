<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;

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

    public function login()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
           // 'email' => 'required|string|email',
            //'password' => 'required|string',
        ]);

        $email    = $request->email;
        $password = $request->password;
        //$id = Auth::user()->id;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $id = Auth::user()->id;
            DB::update('update users set status = ? where id = ?', [1, $id]);
    
            return redirect()->route('dashboard');
        } else {
            return redirect('login')->with('error', 'Oups! votre Email ou mot de passe est incorrecte');
        }
     
    }

    public function logout()
    {$id = null; // Déclaration initiale de la variable $id

        if (Auth::check()) {
            // L'utilisateur est authentifié, vous pouvez maintenant accéder à son ID
            $id = Auth::user()->id;
        } else {
            // Gérer le cas où l'utilisateur n'est pas authentifié
        }
        
        DB::update('update users set status = ? where id = ?',[0, $id]);
        Auth::logout();
        return redirect()->route('login');
    }
}
