<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Modalite_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Modalite_categorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $modalite_categories = modalite_categorie::latest()->get(); 
        //dd( $modalite_categories);
        //$modalite_categories = modalite_categorie::all(); 
        /*$modalite_categories = DB::table('modalite_categories')
                            ->select ('modalite_categories.code','modalite_categories.libelle','categories.libelle')
                            ->where ('modalite_categories.categorie_id=categories.id')

    
                            ->get(); */

         //dd( $modalite_categories);

        
        //$modalite_categories = modalite_categorie::latest()->get(); recupère les enregistrement par ordre alphabetique decroissant
        //$modalite_categories = modalite_categorie::orderBy('libelle')->get(); //recupère les enregistrement par ordre alphabetique croissant
        return view("modalite_categories.index", compact("modalite_categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categorie::orderBy('libelle')->get();
        return view('modalite_categories.modalite_categorie', compact('categories'));
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
       $categorie_id = $request->categorie_id;
       $libelle         = $request->libelle;



       $insert = modalite_categorie::firstOrNew(['id'=>$id]); // if departement_name = departement_name in database exit

         // $insert->id         = $generator;
           $insert->categorie_id         = $categorie_id;
           $insert->libelle         = $libelle;
     
           $insert->save();
      
        //alert("/modalite_categories/update/{$id}");
  

       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Enrégistrement éffectué avec succès.');
   
    }

    /**
     * Display the speci fied resource.
     *
     * @param  \App\Models\modalite_categorie  $modalite_categorie
     * @return \Illuminate\Http\Response
     */
    public function show(modalite_categorie $modalite_categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modalite_categorie  $modalite_categorie
     * @return \Illuminate\Http\Response
     */



   /* public function edit(modalite_categorie $modalite_categorie)
    {
        
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modalite_categorie  $modalite_categorie
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, modalite_categorie $modalite_categorie)
    public function update($id)
    {
        //
       // $data = modalite_categorie::all()->where('id',$id);

       $datas=DB::table('modalite_categories')->find($id);
        $data_cat = Categorie::all();
      

       
         
        //dd($datas);
        return view('modalite_categories.modalite_categorie_edit',compact('datas', 'data_cat'));
    }

    public function edit(Request $request)
    {

      
        $id            = $request->id;
        $categorie_id = $request->categorie_id;
        $libelle         = $request->libelle;
 
 
 
        $insert = modalite_categorie::firstOrNew(['id'=>$id]); // if departement_name = departement_name in database exit
 
          // $insert->id         = $generator;
            $insert->categorie_id         = $categorie_id;
            $insert->libelle         = $libelle;
      
            $insert->save();
       
         //alert("/modalite_categories/update/{$id}");
   
 
        // return redirect()->back()->with('alert','hello');
       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Modification éffectuée avec succès.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modalite_categorie  $modalite_categorie
     * @return \Illuminate\Http\Response
     */
   // public function destroy(modalite_categorie $modalite_categorie)
    public function delete($id)
    {
        //
        $delete = modalite_categorie::find($id);
        $delete->delete();
        return redirect()->back()->with('update','La suppression a été bien éffectuée!');
    }
}
