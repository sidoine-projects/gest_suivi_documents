<?php

namespace App\Http\Livewire;

use App\Models\townUser;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class TownCity extends Component
{


    public $arrondissement_id; // L'identifiant du pays
    public $quartier_id; // L'identifiant de la ville
    public $quartiers; // la collection de villes
    public $arrondissements; // la collection de villes

    


    public function mount()
    {
        $user_id  = Auth::user()->id; 
        $this->quartiers = collect();
        $this->arrondissements = collect();
        //$this->arrondissements = townUser::whereNotNull('quartier')->where('user_id', '=', $user_id)->orderBy('quartier', 'asc')->get();

    }

    // Quand $country_id change, on charge les $cities de $country_id 
    public function updatedArrondissementId($newValue)
    {
        //$this->quartiers = DB::select('select distinct quartier from villages ');
        //orderByDesc
        //$newValue ="FOUNOUGO";
       //$this->quartiers = Village::where("arrondissement", $newValue)->orderBy('quartier')->distinct('quartier')->get(); 
       $user_id  = Auth::user()->id; 

       if($newValue != ''){
        $this->quartiers = townUser::whereNotNull('quartier')->where('user_id', '=', $user_id)->orderBy('quartier', 'asc')->get();

       }else{

        $this->quartiers = collect();
       }

       
       
        //$this->quartiers = Village::select('quartier')->distinct('quartier')->orderBy('quartier')->get();         
    

        //dd($this->quartiers );
    }

    public function updatedQuartierId($newValue)
    {
        //$this->quartiers = DB::select('select distinct quartier from villages ');
        //orderByDesc
        //$newValue ="FOUNOUGO";
       //$this->quartiers = Village::where("arrondissement", $newValue)->orderBy('quartier')->distinct('quartier')->get(); 
       $user_id  = Auth::user()->id; 

       if($newValue != ''){
        $this->arrondissements = townUser::whereNull('quartier')->where('user_id', '=', $user_id)->get();


       }else{

        $this->arrondissements = collect();
       }

       
       
        //$this->quartiers = Village::select('quartier')->distinct('quartier')->orderBy('quartier')->get();         
    

        //dd($this->quartiers );
    }



    //renvoie le les données du select de la table parent 
    public function render()
    {
        // On récupère les pays
       // $arrondissements = Village::select("arrondissement")->distinct('arrondissement')->get();
       $user_id  = Auth::user()->id; 

       $arronddisementsUser = townUser::whereNull('quartier')->where('user_id', '=', $user_id)->get();
       $quartiersUser = townUser::whereNotNull('quartier')->where('user_id', '=', $user_id)->orderBy('quartier', 'asc')->get();
       


        // On retourne la vue avec les pays
        return view('livewire.town-city', compact('arronddisementsUser', 'quartiersUser'));
    }

    // return view('');

}
