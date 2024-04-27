<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

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
  public function index()
  {
    //
    //$categories = Categorie::latest()->get();
    $categories = Categorie::all();
    return view("admin.categories.categorie", compact("categories"));
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
        $categories = Categorie::all();
        return view('Categories.Categorie', compact("categories"));
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
    $categorie     = $request->categorie;


    $findcategorie = Categorie::where('code', $code)->orWhere('categorie', $categorie)->first();

    if (!$findcategorie) {


      $categorieItem = new Categorie();
      $categorieItem->code = $code;
      $categorieItem->categorie = $categorie;

      $categorieItem->save();

      return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }
  }

  /**
   * Display the speci fied resource.
   *
   * @param  \App\Models\Categorie  $Categorie
   * @return \Illuminate\Http\Response
   */
  public function show(Categorie $Categorie)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Categorie  $Categorie
   * @return \Illuminate\Http\Response
   */



  /* public function edit(Categorie $Categorie)
    {
        
    }*/

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Categorie  $Categorie
   * @return \Illuminate\Http\Response
   */


  //public function update(Request $request, Categorie $Categorie)
  public function update($id)
  {
    //strtoupper

    $datas = Categorie::all()->where('id', $id);

    foreach ($datas as $data)
      //dd($data);
      return view('admin.categories.categorie_edit', compact('data'));
  }

  public function edit(Request $request)
  {

    //strtoupper| whereId($id) 
    $data = $request->all();
    $id            = $request->id;
    $code          = $request->code;
    $categorie     = $request->categorie;

   // dd($id ) ;

  
    $findcategorie = Categorie::where([['code', '=', $code], ['id', '!=', $id]])->orWhere([['categorie', '=', $categorie], ['id', '!=', $id ]])->first();

    //dd($findcategorie ) ;

    if (!$findcategorie) {

      Categorie::updateOrCreate([
        'id' => $id 

    ], $data);

      return redirect()->back()->with('insert', 'Modification éffectué avec succès.');

    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }


   /*
    Categorie::updateOrCreate([
      'dimenesion_id' => $request->dimension,
      'annee_id' => $request->annee,
      'sexe_id' => $request->sexe,
    ], $data);*/


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Categorie  $Categorie
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Categorie $Categorie)
  public function delete($id)
  {
    //
    $delete = Categorie::find($id);
    $delete->delete();
    return redirect()->back()->with('update', 'Data deleted successfully!');
  }
}
