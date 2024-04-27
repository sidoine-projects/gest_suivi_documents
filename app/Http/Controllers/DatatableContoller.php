<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatatableContoller extends Controller
{
    //
    public function index()
    {
        return view("datatable" );
    }
}
