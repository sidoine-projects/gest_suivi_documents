<?php

namespace App\Http\Controllers;

use App\Models\Pieces;
use Illuminate\Http\Request;
use App\Models\TypePiece;

class PieceController extends Controller
{

  // public function __construct()
  //   {
  //      $this->middleware('role');

  //      // $this->middleware('Auth');
  //   }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    //$Profils = Profil::latest()->get();
    $piece = Pieces::all();
    return view("admin.piece.index", compact("piece"));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  
   public function create()
   {
       $typesPieces = TypePiece::all();
   
       return view('admin.piece.piece', compact('typesPieces'));
      }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function save(Request $request)
  {
      $piece = $request->piece;
      $findpiece = Pieces::where('piece', $piece)->first();
  
      if (!$findpiece) {
          $pieceItem = new Pieces();
          $pieceItem->typepiece_id = $request->typepiece_id; // Ajoutez le type de pièce associé
          $pieceItem->piece = $piece;
          $pieceItem->montant = $request->montant;
          $pieceItem->save();
          return redirect()->back()->with('insert', 'Enregistrement effectué avec succès.');
      } else {
          return redirect()->back()->with('error', 'La pièce existe déjà.');
      }
  }
  

  /**
   * Display the speci fied resource.
   *
   * @param  \App\Models\Pieces  $Pieces
   * @return \Illuminate\Http\Response
   */
  public function show(Pieces $piece)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pieces  $Pieces
   * @return \Illuminate\Http\Response
   */



  /* public function edit(Profil $Profil)
    {
        
    }*/

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pieces  $Pieces
   * @return \Illuminate\Http\Response
   */


  //public function update(Request $request, Pieces $Pieces)
  public function update($id)
{
    $data = Pieces::find($id);
    $typesPieces = TypePiece::all();

    if (!$data) {
        return redirect()->back()->with('error', 'La pièce n\'existe pas.');
    }

    return view('admin.piece.piece_edit', compact('data', 'typesPieces'));
}

  public function edit(Request $request)
  {
    $id = $request->id;
    $piece = Pieces::find($id);

    if (!$piece) {
        return redirect()->back()->with('error', 'La pièce n\'existe pas.');
    }

    $piece->piece = $request->piece;
    $piece->typepiece_id = $request->typepiece_id;
    $piece->montant = $request->montant;
    $piece->save();

    return redirect()->back()->with('insert', 'Mise à jour effectuée avec succès.');
  }
  

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pieces  $PrPieces
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Pieces $Pieces)
  public function delete($id)
  {
    //
    $delete = Pieces::find($id);
    $delete->delete();
    return redirect()->back()->with('insert', 'Data deleted successfully!');
  }
}
