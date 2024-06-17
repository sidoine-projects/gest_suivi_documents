<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role');

    //     // $this->middleware('Auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('admin/site/index');
    }
    
    public function index()
    {
        //
        $totalUser = User::all()->count();
        $totalSignalement = 0;
        $totalSondage = 0;
        $totalActualite = 0;
        //dd( $totalSondage);
        $actualites = 10;

        //$annee = User::select('created_at')->get();
        $years = User::select(DB::raw("(DATE_FORMAT(created_at, '%Y')) as year"))
            ->orderBy('year')
            ->groupBy('year')
            ->get();

        $users_year = User::select(

            DB::raw("(count(id)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%Y')) as year")
        )
            ->orderBy('year')
            ->groupBy('year')
            ->get();

        //dd( $years);
        # code...
        return view('admin/home', compact('users_year', 'years', 'actualites', 'totalUser', 'totalSignalement', 'totalSondage', 'totalActualite'));

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
