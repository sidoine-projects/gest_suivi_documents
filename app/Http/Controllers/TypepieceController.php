<?php

namespace App\Http\Controllers;

use App\Models\TypePiece;
use Illuminate\Http\Request;

class TypepieceController extends Controller
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
    $typepieces = TypePiece::all();
    return view("admin.typepiece.index", compact("typepieces"));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  
    public function create()
    {
        //
       
        return view('admin.typepiece.typepiece');
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
    $typepiece     = $request->typepiece;


    $findTypepiece = Typepiece::where('typepiece', $typepiece)->first();

    if (!$findTypepiece) {


      $TypepieceItem = new Typepiece();
      $TypepieceItem->typepiece = $typepiece;

      $TypepieceItem->save();

      return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
    } else {

      return redirect()->back()->with('error', 'Le Type de piece existe déjà.');
    }
  }

  /**
   * Display the speci fied resource.
   *
   * @param  \App\Models\Typepiece  $PrTypepiece
   * @return \Illuminate\Http\Response
   */
  public function show(Typepiece $Typepiece)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Typepiece  $Typepiece
   * @return \Illuminate\Http\Response
   */



  /* public function edit(Profil $Profil)
    {
        
    }*/

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Typepiece  $Profil
   * @return \Illuminate\Http\Response
   */


  //public function update(Request $request, Typepiece $Typepiece)
  public function update($id)
  {
    //strtoupper

  
    $data = Typepiece::find($id);
      //dd($data);
      return view('admin.typepiece.typepiece_edit',compact('data'));
  }

  public function edit(Request $request)
  {

    //strtoupper| whereId($id) 
    $data = $request->all();
    $id            = $request->id;
    $typepiece     = $request->typepiece;

   // dd($id ) ;

  
    $findTypepiece = Typepiece::where([['Typepiece', '=', $typepiece], ['id', '!=', $id ]])->first();

    //dd($findTypepiece) ;

    if (!$findTypepiece) {

      Typepiece::updateOrCreate([
        'id' => $id 

    ], $data);

      return redirect()->back()->with('insert', 'Modification éffectué avec succès.');

    } else {

      return redirect()->back()->with('error', 'Typepiece  existe déjà.');
    }


   /*
    Typepiece::updateOrCreate([
      'dimenesion_id' => $request->dimension,
      'annee_id' => $request->annee,
      'sexe_id' => $request->sexe,
    ], $data);*/


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Typepiece  $Profil
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Profil $Profil)
  public function delete($id)
  {
    //
    $delete = Typepiece::find($id);
    $delete->delete();
    return redirect()->back()->with('update', 'Data deleted successfully!');
  }
}
