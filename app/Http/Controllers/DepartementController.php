<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $departements = Departement::latest()->get();
        //$departements = Departement::latest()->get(); recupère les enregistrement par ordre alphabetique decroissant
        //$departements = Departement::orderBy('libelle')->get(); //recupère les enregistrement par ordre alphabetique croissant
        return view("admin.departements.index", compact("departements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::latest()->get();
        return view('admin.departements.departement', compact("departements"));
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
       $code          = $request->code;
       $libelle         = $request->libelle;

      // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
      $insert = Departement::firstOrNew(['code'=>$code,]);
      $insert1 = Departement::firstOrNew(['libelle' => $libelle]);

      
       if (!$insert->exists ){
          if (!$insert1->exists) {
            
         // $insert->id         = $generator;
           $insert->code          = $code;
           $insert->libelle         = $libelle;

           $insert->save();

        //alert("/annees/update/{$id}");


       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Enrégistrement éffectué avec succès.');
          }else {
            return redirect()->back()->with('error',' l\' Enrégistrement  existe déjà.');
          }

       }else{

        return redirect()->back()->with('error','Le code est unique.');
       }

    }

    /**
     * Display the speci fied resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */



   /* public function edit(Departement $departement)
    {

    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Departement $departement)
    public function update($id)
    {
        //
        $data = Departement::all()->where('id',$id);
        foreach($data as $datas)
        return view('departements.departement_edit',compact('datas'));
    }


    
    public function edit(Request $request)
    {

      $data = $request->all();

      $code          = $request->code;
      $libelle         = $request->libelle;

     // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit


      $listDepartement= Departement::all();

     $i = 0;
      // dd( $searchId);

       foreach( $listDepartement as $departement){
           if ( ($departement->code == $code or  $departement->libelle == $libelle)  and $departement->id != $request->id  ) {
               # code...
               $i++;
           }
          
        }

        //dd($i);

        //dd($i, $code, $libelle);

        if($i == 0){

          Departement:: updateOrCreate([
              'code' =>  $code,
             
           
          ], $data);
  
          return redirect()->back()->with('insert', 'modification éffectué avec succès.');
         }else {
             # code...
             return redirect()->back()->with('error', 'Enrégistrement ou le code  existe déjà.');
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Departement $departement)
    public function delete($id)
    {
        //
        $delete = Departement::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }
}
