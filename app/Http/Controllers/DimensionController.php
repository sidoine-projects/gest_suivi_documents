<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dimensions = Dimension::latest()->get();
        return view("dimensions.index", compact("dimensions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dimensions = Dimension::latest()->get();
        return view('dimensions.dimension', compact("dimensions"));
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
     $insert = Dimension::firstOrNew(['code'=>$code,]);
     $insert1 = Dimension::firstOrNew(['libelle' => $libelle]);

     
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
     * @param  \App\Models\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
    public function show(Dimension $dimension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */



   /* public function edit(Dimension $dimension)
    {

    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Dimension $dimension)
    public function update($id)
    {
        //
        $data = Dimension::all()->where('id',$id);
        foreach($data as $datas)
        return view('dimensions.dimension_edit',compact('datas'));
    }

    public function edit(Request $request)
    {
      $data = $request->all();

      $code          = $request->code;
      $libelle         = $request->libelle;

     // $insert = Annee::firstOrNew(['id'=>$id, ]); // if departement_name = departement_name in database exit


      $listDimension= Dimension::all();

     $i = 0;
      // dd( $searchId);

       foreach( $listDimension as $dimension){
           if ( ($dimension->code == $code or  $dimension->libelle == $libelle)  and $dimension->id != $request->id  ) {
               # code...
               $i++;
           }
          
        }

        //dd($i, $code, $libelle);

        if($i == 0){

          Dimension:: updateOrCreate([
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
     * @param  \App\Models\Dimension  $dimension
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Dimension $dimension)
    public function delete($id)
    {
        //
        $delete = Dimension::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }
}
