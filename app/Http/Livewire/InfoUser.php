<?php

namespace App\Http\Livewire;

use App\Models\ActualiteAdmin;
use App\Models\townUser;
use Livewire\WithPagination;
use Livewire\Component;
use Auth ;

class InfoUser extends Component
{
    protected $paginationTheme = 'bootstrap';
    use WithPagination;

    

    public function render()
    {

      $id = Auth::user()->id; 
      $town ="";
    

       $towns = townUser::where([['status','=',1], ['user_id','=',$id]])->get();

          foreach($towns as $item) {
            if($item->quartier == null){
                $town = $item->arrondissement;
              } else{
                $town = $item->quartier;
              }
              
          } 
          

       
        return view('livewire.info-user', [
            'actualites' => ActualiteAdmin::where('quartier',  $town)->orderBy('id', 'desc')->paginate(6),  'town' =>$town,
        ]);
    }
}
