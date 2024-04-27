<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
//use App\User;

class GeolocalisationController extends Controller
{
    //
    public function index(Request $request)
    {
        $ip = '41.85.163.219'; //For static IP address get
       // $ip = \Request::ip(); //Dynamic IP address get
        //$ip = request()->getClientIp(); //Dynamic IP address get
     
        //dd($ip);
        $currentUserInfo = Location::get($ip);                
        return view('geolocalisation',compact('currentUserInfo'));
    }

  
    

    

}
