<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;

class userSondageController extends Controller
{

    public function __construct()
    {
        //$this->middleware('Auth');
        //$this->middleware('admin');

        $this->middleware('Auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $sondages = Survey::latest()->get();
        //dd($sondages);
        return view('user-sondage', compact('sondages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test($slu)
    {
        //

        $sondage = Survey::where('slug', $slu)->firstOrFail();
        //dd($sondages);
        return view('test', compact('sondage'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
