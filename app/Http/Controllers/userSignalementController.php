<?php

namespace App\Http\Controllers;

use App\Models\Signalisation;
use App\Models\Categorie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class userSignalementController extends Controller
{


    public function __construct()
    {
        $this->middleware('Auth');
       // $this->middleware('admin');

        //$this->middleware('users');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $categorie = Categorie::all();
        $signalisations = Signalisation::where('user_id', $id)->get();
      


        return view('signalement-user', compact('categorie', 'signalisations'));


    }

    public function signalisationAdmin()
    {
        //
        $signalisations = Signalisation::latest()->get();
        //dd(  $signalisations);
        return view('admin/signalisations/signalisation', compact('signalisations'));
    }

    public function signalisationDetail($id)
    {
        //
        $signalisation = Signalisation::where('id', $id)->get();
        foreach ($signalisation as $data) 
            # code...
        
        //dd(  $signalisations);
        return view('detail-signalisation', compact('data'));
    }

    public function signalisationAdminDetail($id)
    {
        //
        $signalisation = Signalisation::where('id', $id)->get();
        foreach ($signalisation as $data) 
            # code...
        
        //dd(  $signalisations);
        return view('admin.signalisations.detail-admin-signalisation', compact('data'));
    }


    public function updaterp(Request $request)
    {
        //
        $rpo = $request->rpo;
        $rpn = $request->rpn;
        $id =  $request->id;

        $signalisation = Signalisation::where('id', $id)->get();

        if ($request->rpo !=null ) {

            foreach ($signalisation as $data) 
                # code...
                DB::update('update signalisations set resolue = 1 where id = "'.$id.'"  ');

          
        }else {
            DB::update('update signalisations set resolue = 0 where id = "'.$id.'"  ');

        }
        
        
        //dd( $request->rpo, $request->rpn);
        return redirect()->back();
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*
    public function storeImage(Request $request){
        $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
        <img src="{{ url('public/Image/'.$data->image) }}"
        style="height: 100px; width: 150px;">
       
    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {

        $rules = [
            //'image' => 'bail| image |mimes:jpeg,jpg,bmp,png | dimensions:width=500,height=500 | size:2048',
      
            'image' => 'image | mimes:jpeg,jpg,bmp,png,PNG,JPG,JPEG | max:2000',
            'pdp' => 'required',
            'categorie' => 'required',
            'arrondissement' =>  'required',
            'quartier' =>  'required',
            'commentaire' =>  'required | string',
            'long' =>  'required',
           
        ];
    
        $customMessages = [

            'image.image' => 'Veuillez télécharger une image ! ',
            'image.mimes' => 'Les extensions autorisés : jpeg,jpg,bmp,png ! ',
            'image.max' => 'La taille maximale est 2 Mo ! ',
            'categorie.required' => 'Veuillez selectionner une categorie! ',
            'arrondissement.required' => 'Veuillez selectionner une arrondissement! ',
            'quartier.required' => 'Veuillez selectionner une quartier! ',
            'pdp.required' => 'Veuillez accepter la politique de données personnelles! ',
            'long.required' => 'Veuillez vous localiser! ',
        ];
    
        $this->validate($request, $rules, $customMessages);


/*
        request()->validate(
            [
                'image' => 'mimes:jpeg,jpg,bmp,png',
                'image' => 'max:2048',
                'pdp' => 'required',
                'categorie' => 'required',
                'arrondissement' =>  'required',
                'quartier' =>  'required',
                'commentaire' =>  'required | string',
                'long' =>  'required',
                'lat' =>  'required',
            ],

            [
                'mimes' => 'Les extensions autorisés : jpeg,jpg,bmp,png ! ',
                'size' => 'La taille maxiamal de l\'image autorisé est 2048 MB ! ',
                'pdp.required' => 'Veuillez cocher la politique de donnée personnelle ! ',
            ]
        );
*/
        //$id            = $request->id;
        $categorie_id  = $request->categorie;
        $user_id  = Auth::user()->id;
        $image         = $request->file('image'); //retourne les caractéristique du fichier uploader
        $arrondissement = $request->arrondissement;
        $quartier      = $request->quartier;
        $commentaire   = $request->commentaire;
        $rp            = $request->rp;
        $pdp           = $request->pdp;
        $longitude     = $request->long;
        $latitude      = $request->lat;
        $url_gps       = $request->link;

        if ($request->hasFile('image')) {

            $imagename = date('Y_m_d-H_i_s') . '_' . $image->getClientOriginalName();
            // fonction move pour stocket l'image dans le dossier public à l'aide de la fonction public_path
            $image->move(public_path('/assets/user-images'), $imagename);
            //$request->image->store('image', $imagename);
            //$image->move(public_path('exist/test.png'), public_path('move/test_move.png'));

        } else {
            # code...
            $imagename = null;
        }

       // dd($image->filesize());

        //dd($image, $arrondissement, $quartier );

        // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
        $signalisation = Signalisation::firstOrNew(['categorie_id' => $categorie_id, 'quartier' => $quartier, 'commentaire' => $commentaire, 'url_gps' => $url_gps,]);

        if (!$signalisation->exists) {


            // $insert->id         = $generator;
            $signalisation->categorie_id       = $categorie_id;
            $signalisation->user_id       = $user_id;
            $signalisation->image       = $imagename;
            $signalisation->arrondissement       = $arrondissement;
            $signalisation->quartier       = $quartier;
            $signalisation->commentaire       = $commentaire;
            $signalisation->rp       = $rp;
            $signalisation->pdp       = $pdp;
            $signalisation->longitude       = $longitude;
            $signalisation->latitude       = $latitude;
            $signalisation->pdp       = $pdp;
            $signalisation->url_gps       = $url_gps;
            $signalisation->resolue       = 0;


            $signalisation->save();
            //alert("/annees/update/{$id}");
            //Storage::put($imagename , $content);

            // return redirect()->back()->with('alert','hello');
            // return view('signalement-user');
            return redirect()->back()->with('insert', 'La signalisation a été envoyée avec succès.');
        } else {
            return redirect()->back()->with('error', ' Cette signalisation existe déjà.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
