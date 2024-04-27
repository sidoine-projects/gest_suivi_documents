<?php

namespace App\Http\Controllers;

use App\Models\townUser;
use App\Models\ActualiteAdmin;
use Illuminate\Http\Request;
use Auth ;
class actualiteUserController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('Auth');
        $this->middleware('Auth');
    }
    
    public function index()
    {
      $id = Auth::user()->id;

          //$towns = townUser::where('status', 1)->get();

          $town = "";
        
    
           $towns = townUser::where([['status','=',1], ['user_id','=',$id]])->get();



          foreach($towns as $item) {
            if($item->quartier == null){
                $town = $item->arrondissement;
              } else{
                $town = $item->quartier;
              }
              
          } 
          $actualites_alaune = ActualiteAdmin::Where('alaune','OUI')->orderBy('id', 'Desc')->get();

          
          
          //dd($town);


        return view('actualite-user',compact('actualites_alaune','town'));
    }

}
