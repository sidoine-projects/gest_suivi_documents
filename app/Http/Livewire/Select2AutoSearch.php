<?php

namespace App\Http\Livewire;

//use Illuminate\Support\Facades\DB ;

use App\Models\Thematique;
use App\Models\Village;
use Livewire\Component;
use DB;

class Select2AutoSearch extends Component
{

    //use DB;

    
    public $arrondissement_id; // L'identifiant du pays
    public $quartier_id; // L'identifiant de la ville
    public $quartiers; // la collection de villes
   // public $arrondissements; // la collection de villes

    
    public $viralSongs = '';

    public $dataModified = [];

    public function mount()
    {

        $this->quartiers = collect();
        //$this->arrondissement_id = '4ème Arrondissement';
       $this->quartier_id = session('filtre_quartier');
       //$this->quartier_id = session('filtre_quartier');
        //$this->quartiers = Village::select('quartier')->distinct('quartier')->orderBy('quartier')->get();  
    }

    public function updatedArrondissementId($newValue)
    {
        //$this->quartiers = DB::select('select distinct quartier from villages ');
        //orderByDesc
        //$newValue ="FOUNOUGO";
       $this->quartiers = Village::where("arrondissement", $newValue)->orderBy('quartier')->distinct('quartier')->get();         
        //$this->quartiers = Village::select('quartier')->distinct('quartier')->orderBy('quartier')->get();         
    

        //dd($this->quartiers );
    }


/*
    public $songs = [
        'Say So',
        'The Box',
        'Laxéd',
        'Savage',
        'Dance Monkey',
        'Viral',
        'Hotline Billing',
    ];*/



    public function render()
    {
        $arrondissements = Village::select("arrondissement")->distinct('arrondissement')->get();
        $thematiques = Thematique::distinct('thematique')->orderBy('thematique')->get();

        //return view('livewire.select2-auto-search')->extends('layouts.app');
        return view('livewire.select2-auto-search', compact('arrondissements', 'thematiques'));
    }
}
