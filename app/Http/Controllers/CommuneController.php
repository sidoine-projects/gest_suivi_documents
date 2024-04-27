<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $communes = Commune::latest()->get(); 
        //$communes = Commune::all(); 
        /*$communes = DB::table('communes')
                            ->select ('communes.code','communes.libelle','departements.libelle')
                            ->where ('communes.departement_id=departements.id')

    
                            ->get(); */

         //dd( $communes);

        
        //$communes = Commune::latest()->get(); recupère les enregistrement par ordre alphabetique decroissant
        //$communes = Commune::orderBy('libelle')->get(); //recupère les enregistrement par ordre alphabetique croissant
        return view("communes.index", compact("communes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departements = Departement::orderBy('libelle')->get();
        return view('communes.commune', compact('departements'));
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
       $departement_id = $request->departement_id;
       $code          = $request->code;
       $libelle         = $request->libelle;



       $insert = Commune::firstOrNew(['id'=>$id]); // if departement_name = departement_name in database exit

         // $insert->id         = $generator;
           $insert->code          = $code;
           $insert->departement_id         = $departement_id;
           $insert->libelle         = $libelle;
     
           $insert->save();
      
        //alert("/communes/update/{$id}");
  

       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Enrégistrement éffectué avec succès.');
   
    }

    /**
     * Display the speci fied resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */



   /* public function edit(Commune $commune)
    {
        
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Commune $commune)
    public function update($id)
    {
        //
       // $data = Commune::all()->where('id',$id);

       $datas=DB::table('communes')->find($id);
        $data_dep = Departement::all();
      

       
         
        //dd($datas);
        return view('communes.commune_edit',compact('datas', 'data_dep'));
    }

    public function edit(Request $request)
    {

      
        $id            = $request->id;
        $departement_id = $request->departement_id;
        $code          = $request->code;
        $libelle         = $request->libelle;
 
 
 
        $insert = Commune::firstOrNew(['id'=>$id]); // if departement_name = departement_name in database exit
 
          // $insert->id         = $generator;
            $insert->code          = $code;
            $insert->departement_id         = $departement_id;
            $insert->libelle         = $libelle;
      
            $insert->save();
       
         //alert("/communes/update/{$id}");
   
 
        // return redirect()->back()->with('alert','hello');
       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Modification éffectuée avec succès.');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Commune $commune)
    public function delete($id)
    {
        //
        $delete = Commune::find($id);
        $delete->delete();
        return redirect()->back()->with('update','La suppression a été bien éffectuée!');
    }
}
