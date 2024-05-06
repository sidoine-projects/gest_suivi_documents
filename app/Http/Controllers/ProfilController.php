<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
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
    //$Profils = Profil::latest()->get();
    $profils = Profil::all();
    return view("admin.profils.index", compact("profils"));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  
    public function create()
    {
        //
       
        return view('admin.profils.profil');
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function save(Request $request)
  {


    $id            = $request->id;
    $profil     = $request->profil;


    $findProfil = Profil::where('profil', $profil)->first();

    if (!$findProfil) {


      $ProfilItem = new Profil();
      $ProfilItem->profil = $profil;

      $ProfilItem->save();

      return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }
  }

  /**
   * Display the speci fied resource.
   *
   * @param  \App\Models\Profil  $Profil
   * @return \Illuminate\Http\Response
   */
  public function show(Profil $Profil)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Profil  $Profil
   * @return \Illuminate\Http\Response
   */



  /* public function edit(Profil $Profil)
    {
        
    }*/

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Profil  $Profil
   * @return \Illuminate\Http\Response
   */


  //public function update(Request $request, Profil $Profil)
  public function update($id)
  {
    //strtoupper

    $datas = Profil::all()->where('id', $id);

    foreach ($datas as $data)
      //dd($data);
      return view('admin.Profils.Profil_edit', compact('data'));
  }

  public function edit(Request $request)
  {

    //strtoupper| whereId($id) 
    $data = $request->all();
    $id            = $request->id;
    $code          = $request->code;
    $Profil     = $request->Profil;

   // dd($id ) ;

  
    $findProfil = Profil::where([['code', '=', $code], ['id', '!=', $id]])->orWhere([['Profil', '=', $Profil], ['id', '!=', $id ]])->first();

    //dd($findProfil ) ;

    if (!$findProfil) {

      Profil::updateOrCreate([
        'id' => $id 

    ], $data);

      return redirect()->back()->with('insert', 'Modification éffectué avec succès.');

    } else {

      return redirect()->back()->with('error', 'Le code ou la catégorie  existe déjà.');
    }


   /*
    Profil::updateOrCreate([
      'dimenesion_id' => $request->dimension,
      'annee_id' => $request->annee,
      'sexe_id' => $request->sexe,
    ], $data);*/


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Profil  $Profil
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Profil $Profil)
  public function delete($id)
  {
    //
    $delete = Profil::find($id);
    $delete->delete();
    return redirect()->back()->with('update', 'Data deleted successfully!');
  }
}
