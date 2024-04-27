<?php

namespace App\Http\Controllers;

use App\Models\Thematique;
use Illuminate\Http\Request;

class ThematiqueController extends Controller
{

  public function __construct()
    {
        //$this->middleware('Auth');
        $this->middleware('admin');

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
    //$thematiques = thematique::latest()->get();
    $thematiques = Thematique::all();
    return view("admin.thematiques.thematique", compact("thematiques"));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  /*
    public function create()
    {
        //
        $thematiques = thematique::all();
        return view('thematiques.thematique', compact("thematiques"));
    }*/

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function save(Request $request)
  {


    $id            = $request->id;
    $code          = $request->code;
    $thematique     = $request->thematique;


    $findthematique = Thematique::where('code', $code)->orWhere('thematique', $thematique)->first();

    if (!$findthematique) {


      $thematiqueItem = new Thematique();
      $thematiqueItem->code = $code;
      $thematiqueItem->thematique = $thematique;

      $thematiqueItem->save();

      return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }
  }

  /**
   * Display the speci fied resource.
   *
   * @param  \App\Models\Thematique  $thematique
   * @return \Illuminate\Http\Response
   */
  public function show(thematique $thematique)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Thematique  $thematique
   * @return \Illuminate\Http\Response
   */



  /* public function edit(thematique $thematique)
    {
        
    }*/

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Thematique  $thematique
   * @return \Illuminate\Http\Response
   */


  //public function update(Request $request, thematique $thematique)
  public function update($id)
  {
    //strtoupper

    $datas = Thematique::all()->where('id', $id);

    foreach ($datas as $data)
      //dd($data);
      return view('admin.thematiques.thematique_edit', compact('data'));
  }

  public function edit(Request $request)
  {

    //strtoupper| whereId($id) 
    $data = $request->all();
    $id            = $request->id;
    $code          = $request->code;
    $thematique     = $request->thematique;

   // dd($id ) ;

  
    $findthematique = Thematique::where([['code', '=', $code], ['id', '!=', $id]])->orWhere([['code', '=', $code], ['id', '!=', $id ]])->first();

    //dd($findthematique ) ;

    if (!$findthematique) {

      Thematique::updateOrCreate([
        'id' => $id 

    ], $data);

      return redirect()->back()->with('insert', 'Modification éffectué avec succès.');

    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }


   /*
    thematique::updateOrCreate([
      'dimenesion_id' => $request->dimension,
      'annee_id' => $request->annee,
      'sexe_id' => $request->sexe,
    ], $data);*/


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\thematique  $thematique
   * @return \Illuminate\Http\Response
   */
  // public function destroy(thematique $thematique)
  public function delete($id)
  {
    //
    $delete = Thematique::find($id);
    $delete->delete();
    return redirect()->back()->with('update', 'Data deleted successfully!');
  }
}
