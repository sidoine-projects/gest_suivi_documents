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

            switch (Auth::user()->role_name) {

                case 'admin':

                    $id = Auth::user()->id;
                    DB::update('update users set status = ? where id = ?',[1, $id]);
                      return redirect()->route('admin/home');

                    break;

                case 'users':
                    //dd(session_status ());
                  //  Auth::user()->status = session()->put('status', 'active');
                 
                  //dd($id);
                  //User::updateOrCreate(['id' => $id], ['status' => '1' ]);
                 // User::find($id)->update(['status' => 1]);
                  
                 $id = Auth::user()->id;
                  DB::update('update users set status = ? where id = ?',[1, $id]);
                    return redirect()->route('home');
                   

                   // {{ redirect()->back()->getTargetUrl() }}

                    break;
                default:
                return redirect()->route('home');
            }

           ;

            //return redirect()->intended('admin/home');
        } else {
            return redirect('login')->with('error', 'Oups! votre Email ou mot de passe est incorrecte');
        }
    }

    public function logout()
    {
    
        $id = Auth::user()->id;
        DB::update('update users set status = ? where id = ?',[0, $id]);
        Auth::logout();
        return redirect()->route('home');
    }
}
