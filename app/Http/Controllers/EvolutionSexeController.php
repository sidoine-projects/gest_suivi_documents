<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Departement;
use App\Models\Dimension;
use App\Models\EvolutionAnnee;
use App\Models\EvolutionSexe;
use App\Models\Sexe;
use Illuminate\Http\Request;


use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Evolution_sexe_Export;

use Session;
use PDF;


class EvolutionSexeController extends Controller
{


    //    private  RepositoryInterface  $myRepository;
    //
    //
    //    public function __construct(RepositoryInterface  $myRepository)
    //    {
    //        $this->myRepository = $myRepository;
    //    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_table(Request $request)
    {
        $annees = Annee::latest()->get();
        $id_annee_sexe_1 = $request->annee_sexe_1;
        $id_annee_sexe_2 = $request->annee_sexe_2;



        $submit = $request->submit;


        if ($id_annee_sexe_1 != null && $id_annee_sexe_2 != null) {
        
            $annee_sexe_1_libelle =  \App\Models\Annee::where(['id' => $id_annee_sexe_1])->first()->annee;
            $annee_sexe_2_libelle =  \App\Models\Annee::where(['id' => $id_annee_sexe_2])->first()->annee;
            if ($annee_sexe_1_libelle != $annee_sexe_2_libelle) {
                if ($annee_sexe_1_libelle < $annee_sexe_2_libelle) {
                    # code...
                    $annee1 =   $annee_sexe_1_libelle;
                    $annee2 =    $annee_sexe_2_libelle;
                } else {

                    $annee1 =  $annee_sexe_2_libelle;
                    $annee2 =  $annee_sexe_1_libelle;
                }
              
            } else {
                redirect()->back()->with('error', 'Vous avez choisir les mêmes années. Veuillez choisir différents années');
                $annee1 =  "2015";
                $annee2 =  "2020";
            }



            Session::put('annee1', $annee1);
            Session::put('annee2', $annee2);

            //Session::get('annee1', '2015');
            # code...
            //Session::put('annee1', $annee1);
            //Session::forget('annee2');
            // Session::push('annee1', $annee1);


        } else {

            $annee1 =  "2015";
            $annee2 =  "2020";
        }


        $listDim = Dimension::all();
        $listSexe = Sexe::latest()->get();
        

        $evolution = $this->getEvolutionSexe();

        return view(
            "evolution_sexe.liste",
            compact(
                'listSexe',
                'evolution',
                'listDim',
                'annees',
                'annee1',
                'annee2'
            ),
            //            compact('evolution'),
            //            compact('listDim'),

        );
    }



    public function get_evolution_sexe_data()
    {
        //return Excel::download(new SexeExport, 'sexe.xlsx');
        return Excel::download(new Evolution_sexe_Export, 'Evolution_sexe.xlsx');
    }




    public function downloadPDF(Request $request)
    {


        if (Session::has('annee1')) {
            $annee1 = Session::get('annee1');
        } else {
            $annee1 = "2015";
        }

        if (Session::has('annee2')) {
            $annee2 = Session::get('annee2');
        } else {
            $annee2 = "2020";
        }


        //dd($annee1);
        //dd($annee1);

        $listDim = Dimension::all();
        $listSexe = Sexe::latest()->get();



        $evolution = $this->getEvolutionSexe();

        //      dd($evolution);
        // $annee1 = "2015";
        //$annee2 = "2020";



        $pdf = PDF::loadView('evolution_sexe.pdf', compact(
            'listSexe',
            'evolution',
            'listDim',
            'annee1',
            'annee2'
        ))->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape')
            ->setWarnings(false);

        //return $pdf->download('evolution.pdf');
        return $pdf->stream('evolution_sexe.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Session::forget('annee1');
        //dd(Session::get('submit'));
        //dd(Session::get('annee1'));
        $annees = Annee::latest()->get();


        $listDim = Dimension::all();
        $listSexe = Sexe::latest()->get();


        $evolution = $this->getEvolutionSexe();

        //      dd($evolution);

        $url = route('evolution_sexe');

        if ($url) {
            Session::forget('annee1');
            Session::forget('annee2');
        }

        if (Session::has('annee1')) {
            $annee1 = Session::get('annee1');
        } else {
            $annee1 = "2015";
        }

        if (Session::has('annee2')) {
            $annee2 = Session::get('annee2');
        } else {
            $annee2 = "2020";
        }
        /*$annee1 = "2015";
        $annee2 = "2020";*/

        return view(
            "evolution_sexe.liste",
            compact(
              
                'listSexe',
                'evolution',
                'listDim',
                'annees',
                'annee1',
                'annee2'
            ),
            //            compact('evolution'),
            //            compact('listDim'),

        );
    }


    public  function getEvolutionSexe()
    {

        return     DB::select('SELECT  s.libelle as sexe, es.taux ,a.annee, d.libelle as dimension
                                            FROM sexes s
                                            left join evolution_sexes es on s.id = es.sexe_id
                                            left join annees a on es.annee_id = a.id
                                            left join dimensions d on es.dimenesion_id = d.id
                                         
                                                                                 
                                ', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        $evolutionSexe = EvolutionSexe::latest()->get(); 
        $annees = Annee::latest()->get();
        $dimensions = Dimension::latest()->get();
        $sexes = Sexe::latest()->get();


        return view("evolution_sexe.saisie", compact("evolutionSexe","annees", "sexes", "dimensions"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'taux' => 'bail|required|numeric|regex:/^\d*\.\d*$/',
            
        ]);

        $storeData = EvolutionSexe::firstOrNew([
            'dimenesion_id' => $request->dimension,
            'annee_id' => $request->annee,
            'sexe_id' => $request->sexe,
        ]);

        if (!$storeData->exists) {


            $storeData->dimenesion_id = $request->dimension;
            $storeData->annee_id = $request->annee;
            $storeData->sexe_id = $request->sexe;
            $storeData->taux = $request->taux;

            $storeData->save();

            return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');
        } else {

            return redirect()->back()->with('error', 'Enrégistrement  existe déjà.');
        }
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


    public function edit(Request $request)
    {


        $request->validate([
            'taux' => 'bail|required|numeric|regex:/^\d*\.\d*$/',
            
        ]);
        
       $data = $request->all();
        $searchId = EvolutionSexe::firstOrNew([
            'dimenesion_id' => $request->dimension,
            'annee_id' => $request->annee,
            'sexe_id' => $request->sexe,
        ]);

        //$listEvolutionsexe = EvolutionSexe::where('id', '!=',  $searchId->id )->get();
        $listEvolutionsexe = EvolutionSexe::all();

       //$listEvolutionsexe = $searchId->all();

        $i = 0;
       

       foreach( $listEvolutionsexe as $evolutionsexe){
           if ($evolutionsexe->dimenesion_id === $searchId->dimenesion_id &&  $evolutionsexe->annee_id === $searchId->annee_id && $evolutionsexe->sexe_id === $searchId->sexe_id && $evolutionsexe->id != $request->id  ) {
               # code...
               $i++;
           }
          
        }
       

       //dd($listEvolutionsexe, $i, $request->id, $request->dimension, $searchId->id  );

       //dd(  $i);

       if($i == 0){

       EvolutionSexe:: updateOrCreate([
            'dimenesion_id' => $request->dimension,
            'annee_id' => $request->annee,
            'sexe_id' => $request->sexe,
        ], $data);

        return redirect()->back()->with('insert', 'modification éffectué avec succès.');
       }else {
           # code...
           return redirect()->back()->with('error', 'Enrégistrement  existe déjà.');
       }
      


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $annees = Annee::all();


        $listDim = Dimension::all();
        $listSexe = Sexe::all();

        $data = EvolutionSexe::all()->where('id',$id);

        foreach($data as $datas)

        return view('evolution_sexe.evolution_sexe_edit',compact('datas','annees', 'listDim', 'listSexe' ));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
        $delete = EvolutionSexe::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }*/

    public function delete($id)
    {
        //
        $delete = EvolutionSexe::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
    }
}
