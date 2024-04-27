<?php

namespace App\Http\Controllers;

use App\Models\Sexe;
use Illuminate\Http\Request;

class SexeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sexes = Sexe::latest()->get();
        return view("sexes.index", compact("sexes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexes = Sexe::latest()->get();
        return view('sexes.sexe', compact("sexes"));
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
     $insert = Sexe::firstOrNew(['code'=>$code,]);
     $insert1 = Sexe::firstOrNew(['libelle' => $libelle]);

     
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
     * @param  \App\Models\Sexe  $sexe
     * @return \Illuminate\Http\Response
     */
    public function show(Sexe $sexe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sexe  $sexe
     * @return \Illuminate\Http\Response
     */



   /* public function edit(Sexe $sexe)
    {

    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sexe  $sexe
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Sexe $sexe)
    public function update($id)
    {
        //
        $data = Sexe::all()->where('id',$id);
        foreach($data as $datas)
        return view('sexes.sexe_edit',compact('datas'));
    }

    public function edit(Request $request)
    {
      $data = $request->all();

      $code          = $request->code;
      $libelle         = $request->libelle;

     // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit


      $listSexe= Sexe::all();

     $i = 0;
      // dd( $searchId);

       foreach( $listSexe as $sexe){
           if ( ($sexe->code == $code or  $sexe->libelle == $libelle)  and $sexe->id != $request->id  ) {
               # code...
               $i++;
           }
          
        }

        //dd($i, $code, $libelle);

        if($i == 0){

          Sexe:: updateOrCreate([
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
     * @param  \App\Models\Sexe  $sexe
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Sexe $sexe)
    public function delete($id)
    {
        //
        $delete = Sexe::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }
}
