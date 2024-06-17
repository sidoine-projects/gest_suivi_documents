<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use Hash;

class RegisterController extends Controller
{
    public function __construct()
    {

        //$this->middleware('users');
        //$this->middleware('admin');

    }

    public function index()
    {
        // $users = User::all();
        $users = User::where('role_name', '!=', 'super_admin')->get();
        return view('admin.users.index', compact('users'));
    }

    public function register()
    {
        $profils = Profil::all();
        return view('auth.register', compact('profils'));
    }

    public function registerAdmin()
    {
        $users = User::latest()->get();
        return view('admin.users.user', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prename' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|numeric|digits:8|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $roleName = 'admin'; // Valeur par défaut
        if ($request->profil_id == 1) {
            $roleName = 'etudiant';
        } elseif ($request->profil_id == 2) {
            $roleName = 'enseignant';
        }    

        User::create([
            'name' => $request->name,
            'prename' => $request->prename,
            'tel' => $request->tel,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'profil_id' => $request->profil_id,
            'role_name' => 'administration',
            'password' => Hash::make($request->password),
        ]);
        return redirect('login');
    }


    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prename' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|numeric|digits:8|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'prename' => $request->prename,
            'tel' => $request->tel,
            'role_name' => 'admin',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //return redirect('login');
    }

    public function update($id)
    {
        //

        $datas = User::all()->where('id', $id);
        foreach ($datas as $data)
            return view('admin.users.user_edit', compact('data'));
    }


    public function edit(Request $request)
    {

        $data = $request->all();

        $nom          = $request->name;
        $prenom          = $request->prename;
        $email          = $request->email;
        $tel          = $request->tel;
        $password          = $request->password;


        // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit


        $users = User::all();

        $i = 0;
        // dd( $searchId);

        foreach ($users as $user) {
            if (($user->nom == $nom and  $user->prename == $prenom   and  $user->email == $email) or $user->tel == $tel and $user->id != $request->id) {
                # code...
                $i++;
            }
        }

        //dd($i);

        //dd($i, $code, $libelle);

        if ($i == 0) {

            User::updateOrCreate([

                'id' => $request->id,



            ], [
                'name' => $request->name,
                'prename' => $request->prename,
                'tel' => $request->tel,
                'role_name' => 'admin',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('insert', 'modification éffectué avec succès.');
        } else {
            # code...
            return redirect()->back()->with('error', 'L\'utilisateur existe dejà  existe déjà.');
        }
    }


    public function delete($id)
    {
        //
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with('update', 'Data deleted successfully!');
    }
}
