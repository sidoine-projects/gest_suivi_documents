<?php

namespace App\Http\Livewire;

use App\Models\ActualiteAdmin;
use Livewire\WithPagination;
use Livewire\Component;


class ActualitesPagination extends Component
{

    public function mount()
    {
        
    }
    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        // return view('livewire.actualites-pagination');
        if (session('filtre_arrondissement') && !session('filtre_thematique') && !session('filtre_quartier')) {

           $actualites = ActualiteAdmin::where('arrondissement', session('filtre_arrondissement'))->orderBy('id', 'desc')->paginate(2);

        }elseif(session('filtre_quartier') && !session('filtre_thematique') && !session('filtre_arrondissement')) {

            $actualites = ActualiteAdmin::where('quartier', session('filtre_quartier'))->orderBy('id', 'desc')->paginate(2);

        }elseif(session('filtre_thematique') && !session('filtre_arrondissement') && !session('filtre_quartier')) {

            $actualites = ActualiteAdmin::where('thematique_id', session('filtre_thematique'))->orderBy('id', 'desc')->paginate(2);

        }elseif(session('filtre_thematique') && session('filtre_quartier')) {

            $actualites = ActualiteAdmin::where(['thematique_id'=>session('filtre_thematique'), 'quartier'=>session('filtre_quartier')])->orderBy('id', 'desc')->paginate(2);

        }elseif(session('filtre_thematique') && session('filtre_arrondissement')) {
        

            $actualites = ActualiteAdmin::where(['thematique_id'=>session('filtre_thematique'), 'arrondissement'=>session('filtre_arrondissement')])->orderBy('id', 'desc')->paginate(2);

        }else{
            $actualites = ActualiteAdmin::orderBy('id', 'desc')->paginate(6);

        }

        return view('livewire.actualites-pagination', compact('actualites'));
        /* return view('livewire.actualites-pagination', [
            'actualites' => ActualiteAdmin::orderBy('id', 'desc')->paginate(6),
        ]);*/
    }
}
