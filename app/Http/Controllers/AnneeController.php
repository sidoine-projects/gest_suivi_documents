<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use Illuminate\Http\Request;


class AnneeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $annees = Annee::latest()->get();
        return view("annees.index", compact("annees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $annees = Annee::latest()->get();
        return view('annees.annee',compact("annees"));
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
       $annee         = $request->annee;

      // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
      $insert = Annee::firstOrNew(['code'=>$code,]);
      $insert1 = Annee::firstOrNew(['annee' => $annee]);

      
       if (!$insert->exists ){
          if (!$insert1->exists) {
            
         // $insert->id         = $generator;
           $insert->code          = $code;
           $insert->annee         = $annee;

           $insert->save();

        //alert("/annees/update/{$id}");


       // return redirect()->back()->with('alert','hello');
         return redirect()->back()->with('insert','Enrégistrement éffectué avec succès.');
          }else {
            return redirect()->back()->with('error',' l\'Année  existe déjà.');
          }

       }else{

        return redirect()->back()->with('error','Le code est unique.');
       }

    }

    /**
     * Display the speci fied resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    public function show(Annee $annee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */



   /* public function edit(Annee $annee)
    {

    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Annee $annee)
    public function update($id)
    {
        //
        $data = Annee::all()->where('id',$id);

        foreach($data as $datas)
        return view('annees.annee_edit',compact('datas'));
    }

    public function edit(Request $request)
    {

      $data = $request->all();

      $code          = $request->code;
      $libelle         = $request->annee;

     // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit
     $searchcode = Annee::firstOrNew(['code'=>$code,]);
     $searchILibelle = Annee::firstOrNew(['annee'=>$libelle,]);

      $listAnnee= Annee::all();

     $i = 0;
      // dd( $searchId);

       foreach( $listAnnee as $Annee){
           if ( ($Annee->code == $searchcode->code or  $Annee->annee == $searchILibelle->annee )  and $Annee->id != $request->id  ) {
               # code...
               $i++;
           }
          
        }

        //dd($i);

        //dd($i, $code, $libelle);

        if($i == 0){

          Annee::updateOrCreate([
              'code' =>  $code,
          ],$data);
  
          return redirect()->back()->with('insert', 'modification éffectué avec succès.');
         }else {
             # code...
             return redirect()->back()->with('error', 'Enrégistrement ou le code  existe déjà.');
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annee  $annee
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Annee $annee)
    public function delete($id)
    {
        //
        $delete = Annee::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }
}
