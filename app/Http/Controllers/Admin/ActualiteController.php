<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActualiteAdmin;
use App\Models\Thematique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
class ActualiteController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('admin');

        // $this->middleware('Auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        //
        # code...

        $thematiques = Thematique::distinct('thematique')->orderBy('thematique')->get();

        return view('admin/actualites/actualite', compact('thematiques'));
    }



    public function index()
    {
        //
        # code...
        $actualites = ActualiteAdmin::latest()->get();

        $thematiques = Thematique::distinct('thematique')->orderBy('thematique')->get();

        return view('admin/actualites/index', compact('thematiques','actualites'));
    }

    public function update($id)
    {
        //
        $datas = ActualiteAdmin::all()->where('id', $id);
        foreach ($datas as $actualitedata)
            Session::put('actualitedata', $actualitedata);
        //dd(session('actualitedata')->titre);
        return view('admin/actualites/actualite_edit');
    }






    public function save(Request $request)
    {


        //
        /*$request->validate([
           // 'image' => 'max:10000 |mimes:jpeg,jpg,bmp,png', //10MB , dimensions:width=500,height=500

            'image' => 'bail| image|mimes:jpeg,jpg,bmp,png | dimensions:width=500,height=500 | size:2048', //10MB , dimensions:width=500,height=500
            /*'categorie' => 'required', 
            'arrondissement' =>  'required', 
            'quartier' =>  'required', 
            'commentaire' =>  'required | string', 
            'long' =>  'required', 
            'lat' =>  'required', 
        ]);*/

        $rules = [
            //'image' => 'bail| image |mimes:jpeg,jpg,bmp,png | dimensions:width=500,height=500 | size:2048',
            'image' => 'image | mimes:jpeg,jpg,bmp,png,PNG,JPG,JPEG | max:2000 | required |  dimensions:width=600,height=525',
            'quartier' => 'required',
            'description' => 'required',

        ];

        $customMessages = [
            'image.image' => 'Veuillez télécharger une image ! ',
            'image.required' => 'Veuillez télécharger une image ! ',
            'image.mimes' => 'Les extensions autorisés : jpeg,jpg,bmp,png,PNG,JPG,JPEG ! ',
            'image.max' => 'La taille maximale est 2 Mo ! ',
            'image.dimensions' => 'Veuillez télécharger une image de l\'argeur 600px et de hauteur 525px  ! ',
        ];

        $this->validate($request, $rules, $customMessages);



        /*request()->validate([
    'image' => 'mimes:jpeg,jpg,bmp,png',
            'image' => 'dimensions:width=500,height=500',
 
        ],
        [
        'mimes' => 'Les extensions autorisés : jpeg,jpg,bmp,png ! ',
                    'dimensions' => 'Veuillez télécharger une image de l\'argeur 500px et de hauteur 500px  ! ',
        ]);*/


        //$id            = $request->id;
        $thematique_id  = $request->thematique_id;
        $auteur  = Auth::user()->id;
        $image         = $request->file('image'); //retourne les caractéristique du fichier uploader
        $arrondissement = $request->arrondissement;
        $quartier      = $request->quartier;
        $titre      = $request->titre;
        $description   = $request->description;
        $alaune   = $request->alaune;


        if ($request->hasFile('image')) {

            $imagename =str_replace(" ", "", date('Y_m_d-H_i_s') . '_' . $image->getClientOriginalName());
            // fonction move pour stocket l'image dans le dossier public à l'aide de la fonction public_path
            $image->move(public_path('/assets/actualites-images'), $imagename);
            //$request->image->store('image', $imagename);
            //$image->move(public_path('exist/test.png'), public_path('move/test_move.png'));

        } else {
            # code...
            $imagename = null;
        }


        //dd($image, $arrondissement, $quartier );

        // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
        $actualite = ActualiteAdmin::firstOrNew(['thematique_id' => $thematique_id, 'quartier' => $quartier, 'titre' => $titre, 'description' => $description]);

        if (!$actualite->exists) {


            // $insert->id         = $generator;
            $actualite->thematique_id       = $thematique_id;
            $actualite->auteur       = $auteur;
            $actualite->image       = $imagename;
            $actualite->arrondissement       = $arrondissement;
            $actualite->quartier       = $quartier;
            $actualite->titre       = $titre;
            $actualite->description       = $description;
            $actualite->alaune       = $alaune;

            $actualite->save();
            //alert("/annees/update/{$id}");
            //Storage::put($imagename , $content);

            // return redirect()->back()->with('alert','hello');
            // return view('signalement-user');
            return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
        } else {
            return redirect()->back()->with('error', ' Cette publication existe déjà.');
        }
    }




    public function edit(Request $request)
    {


        $rules = [
            //'image' => 'bail| image |mimes:jpeg,jpg,bmp,png | dimensions:width=500,height=500 | size:2048',
            'image' => 'image | mimes:jpeg,jpg,bmp,png,PNG,JPG,JPEG | max:2000 | required |  dimensions:width=600,height=525',
            'quartier' => 'required',
            'description' => 'required',

        ];

        $customMessages = [
            'image.image' => 'Veuillez télécharger une image ! ',
            'image.required' => 'Veuillez télécharger une image ! ',
            'image.mimes' => 'Les extensions autorisés : jpeg,jpg,bmp,png,PNG,JPG,JPEG ! ',
            'image.max' => 'La taille maximale est 2 Mo ! ',
            'image.dimensions' => 'Veuillez télécharger une image de l\'argeur 600px et de hauteur 525px  ! ',
        ];

        $this->validate($request, $rules, $customMessages);


        $id            = $request->id;

        $thematique_id  = $request->thematique_id;
        $auteur  = Auth::user()->id;
        $image         = $request->file('image'); //retourne les caractéristique du fichier uploader
        $arrondissement = $request->arrondissement;
        $quartier      = $request->quartier;
        $titre      = $request->titre;
        $description   = $request->description;
        $alaune       = $request->alaune;


        if ($request->hasFile('image')) {

            $image_path = url('assets/actualites-images/'.session('actualitedata')->image);
            //dd($image_path);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $imagename = str_replace(" ", "", date('Y_m_d-H_i_s') . '_' . $image->getClientOriginalName());
            // fonction move pour stocket l'image dans le dossier public à l'aide de la fonction public_path
            $image->move(public_path('/assets/actualites-images'), $imagename);
            //$request->image->store('image', $imagename);
            //$image->move(public_path('exist/test.png'), public_path('move/test_move.png'));

        } else {
            # code...
            $imagename = null;
        }


        //dd($image, $arrondissement, $quartier );

        // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
        $actualite = ActualiteAdmin::where([['thematique_id', '=', $thematique_id], ['quartier', '=', $quartier], ['titre', '=', $titre], ['description', '=', $description], ['id', '!=', $id]])->first();

        //$findcategorie = Categorie::where([['code', '=', $code], ['id', '!=', $id]])->orWhere([['categorie', '=', $categorie], ['id', '!=', $id ]])->first();

        if (!$actualite) {


            ActualiteAdmin::updateOrCreate(
                [
                    'id' => $id

                ],

                [
                    'thematique_id' => $thematique_id,
                    'auteur' => $auteur,
                    'image' => $imagename,
                    'arrondissement' => $arrondissement,
                    'quartier' => $quartier,
                    'titre' => $titre,
                    'id' => $id,
                    'description' => $description,
                    'alaune' => $alaune,


                ]
            );


            return redirect()->back()->with('insert', 'Modification éffectué avec succès.');
        } else {
            return redirect()->back()->with('error', ' Cette publication existe déjà.');
        }
    }




    public function delete($id)
    {
      //
      $delete = ActualiteAdmin::find($id);
      $image_path = public_path('assets/actualites-images/'.$delete->image);
      //dd($image_path);

      if (File::exists($image_path)) {
          File::delete($image_path);
      }
 
      $delete->delete();
      return redirect()->back()->with('update', 'Data deleted successfully!');
    }








}
