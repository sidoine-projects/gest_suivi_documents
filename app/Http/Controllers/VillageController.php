<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use DB;
class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarrondissement()
    {
        //

        //DB::select('select distinct arrondissement from villages where active = ?', [1])
        $arrondissements = DB::select('select distinct arrondissement from villages order by arrondissement asc');
        $quartiers = DB::select('select distinct quartier from villages order by quartier asc');
        return view('arrondissement', compact('arrondissements', 'quartiers'));
        //dd( count($quartier) );
        
    }

    public function listquartier(Request $request )
    {
        //
      

        //DB::select('select distinct arrondissement from villages where active = ?', [1])
        $quartiers = DB::select('select distinct quartier from villages where arrondissement = ? order by quartier asc', [ $arrondissement]);
        return view('quartier', compact('quartier'));
        //dd( count($arrondissement) );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        //
    }
}
