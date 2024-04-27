<?php

namespace App\Http\Livewire;

use App\Models\ActualiteAdmin;
use App\Models\Thematique;
use App\Models\Village;
use Livewire\Component;


class ActualitesArrondissementsQuartierSelect extends Component
{


    public $arrondissement_id; // L'identifiant du pays
    public $quartier_id; // L'identifiant de la ville
    public $quartiers; // la collection de villes

    public function mount()
    {
        $this->quartiers = collect();
    }

    // Quand $country_id change, on charge les $cities de $country_id 
    public function updatedArrondissementId($newValue)
    {
        //$this->quartiers = DB::select('select distinct quartier from villages ');
        //orderByDesc
        //$newValue ="FOUNOUGO";
       $this->quartiers = Village::where("arrondissement", $newValue)->orderBy('quartier')->distinct('quartier')->get();         
        //$this->quartiers = Village::select('quartier')->distinct('quartier')->orderBy('quartier')->get();         
    

        //dd($this->quartiers );
    }

    //renvoie le les données du select de la table parent 
    public function render()
    {
        // On récupère les pays
  
        $arrondissements = Village::select("arrondissement")->distinct('arrondissement')->get();
        $thematiques = Thematique::distinct('thematique')->orderBy('thematique', 'asc')->get();
      
        // On retourne la vue avec les pays
        return view('livewire.actualites-arrondissements-quartier-select', compact('arrondissements','thematiques'));
    }

    // return view('');

}
