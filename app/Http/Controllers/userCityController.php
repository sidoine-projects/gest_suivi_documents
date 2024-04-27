<?php

namespace App\Http\Controllers;

use App\Models\Thematique;
use App\Models\PreferenceThematiqueUser;
use App\Models\townUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userCityController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('Auth');
        $this->middleware('Auth');
    }


    public function index()
    {
        $user_id  = Auth::user()->id;
        $thematiquesUser = PreferenceThematiqueUser::where('user_id',  $user_id)->get();

        $arronddisementsUser = townUser::whereNull('quartier')->where('user_id', '=', $user_id)->get();
        $quartiersUser = townUser::whereNotNull('quartier')->where('user_id', '=', $user_id)->orderBy('quartier', 'asc')->get();
        

       
        //dd( $checktown);
        //dd($quartiersUser);

        //dd($thematiquesUser);

        $thematiques = Thematique::all();

        return view('user-city', compact('thematiques', 'thematiquesUser', 'arronddisementsUser', 'quartiersUser',));
    }



    public function save(Request $request)
    {

        $user_id  = Auth::user()->id;
        
        PreferenceThematiqueUser::where('user_id', $user_id)->delete();

        DB::statement('ALTER TABLE preference_thematique_users AUTO_INCREMENT = ' . (count(PreferenceThematiqueUser::all()) + 1) . ';');

        $thematiquesUser = $request->input('thematiques');



        foreach ($thematiquesUser as $thematique) {

            PreferenceThematiqueUser::firstOrCreate([
                'user_id' => $user_id,
                'thematique_id' => $thematique,
            ]);
        }


        return redirect()->back()->with('insert-thematique', 'Enrégistrement éffectué avec succès.');
        // return redirect(url()->previous() .'#thematiques')->with('success', 'Data Your Comment has been created successfully');
        //return redirect()->to(url()->previous())->withFragment('#thematiques');
        //return \Redirect::to(\URL::route('la_route', ['#thematiques']));
        //return $url->previous() . '#thematiques';
        //return Redirect::to(URL::previous() . "#thematiq");
        // return redirect()->route('user-city')->withFragment('thematiq');



    }


    public function updateStatus(Request $request)

    {
        $arrondissement = $request->arrondissement;
        $quartier = $request->quartier;

        $townUsers = townUser::all();


        if ($arrondissement) {

            foreach ($townUsers as $townUser) {
                # code...
                DB::update('update town_users set status = 0 where user_id = "'.Auth::user()->id.'"  ');
            }
   
            DB::update('update town_users set status = ? where arrondissement = ? and user_id =? ', [1,  $arrondissement, Auth::user()->id]);
            return redirect()->back()->with('insert-choix', 'Le choix a été bien éffectué .');

          
        }


        if ($quartier) {

            foreach ($townUsers as $townUser) {
                # code...
                DB::update('update town_users set status = 0 where user_id = "'.Auth::user()->id.'" ');
            }
         
            DB::update('update town_users set status = ? where quartier = ?', [1,  $quartier, Auth::user()->id]);
            return redirect()->back()->with('insert-choix', 'Le choix a été bien éffectué .');
        }

        // DB::update('update town_users set status = ? where id = ?',[1, $id]);
    }


    public function townUser(Request $request)
    {

        //$id            = $request->id;
        $user_id  = Auth::user()->id;
        $arrondissement = $request->arrondissement;
        $quartier      = $request->quartier;


        //dd($image, $arrondissement, $quartier );

        // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
        $townUser1 = townUser::firstOrNew(['user_id' => $user_id, 'arrondissement' => $arrondissement]);
        $townUser2 = townUser::firstOrNew(['user_id' => $user_id, 'arrondissement' => $arrondissement, 'quartier' => $quartier]);

        if (!$townUser1->exists || !$townUser2->exists) {


            // $insert->id         = $generator;
            $townUser1->user_id       = $user_id;
            $townUser1->arrondissement       = $arrondissement;
            $townUser1->quartier       = $quartier;
            $townUser1->status       = 0;

 
            /*townUser::where('user_id', $user_id)->delete();
            DB::statement('ALTER TABLE town_users AUTO_INCREMENT = ' . (count(PreferenceThematiqueUser::all()) + 1) . ';');*/

            $townUser1->save();


            return redirect()->back()->with('insert', 'Ajout a été éffectué avec succès.');
        } else {
            return redirect()->back()->with('error', 'Vous avez déjà choisir cet arrondissement ou quartier.');
        }
    }


    public function delete($id)
    {
        //

        $delete = townUser::find($id);
        $delete->delete();


        return redirect()->back()->with('insert','Data deleted successfully!');
    }





}
