<?php

namespace App\Http\Controllers;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use App\Models\ActualiteAdmin;
use App\Models\Signalisation;
use App\Models\User;
use App\Models\Comment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('Auth');
        //$this->middleware('users');
  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* public function search(Request $request)
    {
        $data = Village::select("quartier")
        ->where("quartier","LIKE","%{$request->input('search')}%")
        ->get();
       // dd($data);
        return response()->json($data);
    }*/

    public function profil()
    {
        $id  = Auth::user()->id;
        $users = User::where('id', $id)->get();
        foreach ($users as $user) 
           

        return view('profilUser',compact('user'));

    }

    public function home()
    {
        $totalUser = User::all()->count();
         $totalSignalement = 0;
        // $totalSignalement = Signalisation::all()->count();
        $totalSondage = 0;
        // $totalSondage = Survey::all()->count();
        $totalActualite = ActualiteAdmin::all()->count();
        //dd( $totalSondage);
        $actualites = ActualiteAdmin::orderBy('id', 'Desc')->get();
        $actualites_alaune = ActualiteAdmin::Where('alaune','OUI')->orderBy('id', 'Desc')->get();

        return view('home', compact('actualites_alaune','actualites', 'totalUser','totalSignalement','totalSondage','totalActualite'));
    }

    public function filtre(Request $request)
    {
        $filtre_arrondissement = $request->arrondissement;
        $filtre_quartier = $request->quartier;
        $filtre_thematique = $request->thematique;
        $actualites_alaune = ActualiteAdmin::Where('alaune','OUI')->orderBy('id', 'Desc')->get();

        /*
        //pour stcoker
        Session::put('key', 'value');
        session(['key' => 'value']);
        //pour recuperer
            $value = Session::get('key');
        $value = session('key');
        */

        
        $totalUser = User::all()->count();
        $totalSignalement = Signalisation::all()->count();
        $totalSondage = Survey::all()->count();
        $totalActualite = ActualiteAdmin::all()->count();
        //dd( $totalSondage);
        $actualites = ActualiteAdmin::orderBy('id', 'Desc')->get();


        Session::put('filtre_arrondissement', $filtre_arrondissement);
        Session::put('filtre_quartier', $filtre_quartier);
        Session::put('filtre_thematique', $filtre_thematique);

        if (session('filtre_quartier')) {
            # code...
            Session::put('filtre_arrondissement', null);
        }

       // $actualites = ActualiteAdmin::where('thematique_id', session('thematique_id'))->orderBy('id', 'desc')->paginate(2);
        //dd(   $actualites,session('filtre_arrondissement'), session('filtre_quartier'), session('filtre_thematique'));
        return view('home', compact('actualites_alaune','actualites', 'totalUser','totalSignalement','totalSondage','totalActualite'));
        //$filtre_arrondissement= $filtres = ActualiteAdmin::whare()->orderBy('id', 'Desc')->get();

    } 

public function showArticle($id){

   Paginator::useBootstrap();
    
    DB::update('update actualite_admins set nbrview = nbrview +1 where id = "'.$id.'"  ');

    $actualites_alaune = ActualiteAdmin::Where('alaune','OUI')->orderBy('id', 'Desc')->get();

    $datarand =ActualiteAdmin::latest()->limit(8)->get();
    //dd( $datarand );
    $datas = ActualiteAdmin::all()->where('id',$id);
    foreach($datas as $data)

    $url = url('single-article/'.$data->id.'/'.$data->titre);

    $comments = Comment::where('actualite_id',$id)->orderBy('id', 'Desc')->paginate(5);
    //$comments = Comment::where('actualite_id',$id)->orderBy('id', 'Desc')->get();

  

    $commentscount = Comment::where('actualite_id',$id)->count();
    
    
    /*$actualitescount=  DB::table('actualite_admins')
          //->leftjoin('thematiques', 'thematiques.id', '=', 'actualite_admins.thematique_id')
          ->select('actualite_admins.id', 'actualite_admins.thematique_id', 'actualite_admins.image', 'actualite_admins.created_at', 'actualite_admins.titre', 'actualite_admins.description', 'thematique')
          ->where('titre', 'LIKE', "%{$search}%")
          ->orWhere('description', 'LIKE', "%{$search}%")
          ->orWhere('auteur', 'LIKE', "%{$search}%")
          ->orWhere('thematique', 'LIKE', "%{$search}%")
          ->count();*/

    return view('single-article',compact('url','actualites_alaune','data','datarand', 'comments', 'commentscount' ));

}

public function commentArticle(Request $request){
    
    if (!empty(Auth::user()->id)  ) {

        $commentuser =  $request->comment;
        $actualite_id =  $request->actualite_id;
   
       
        $commentItem = new Comment();
     
        $commentItem->user_id = Auth::user()->id;
        $commentItem->actualite_id = $actualite_id;
        $commentItem->comment = $commentuser;
        
     
          $commentItem->save();
     
          return redirect()->back()->with('insert', 'Commentaire bien ajouté.');
    }else {
        
        return redirect()->route('login');
    }

  
   

    

}









    public function index()
    {

        /*
        $listAnnee = Annee::all()->sortBy("annee");
        $listsexe = Sexe::all();
        $listNiveau = Niveau_instruction::all();
        $listDim = Dimension::all();
        $listNiveau = Niveau_instruction::all();
        $listMilieu_residence = Milieu_residence::all();
        $listDepartement = Departement::all();
        */

        /*****************Evolution********************* */
        /*  $evolutionAnnee = $this->getEvolutionAnnee("");
        $evolutionSexe = $this->getEvolutionSexe();
        $evolutionNivInstr = $this->getEvolutionNivInstruc();
        $evolutionMilieu_residence = $this->getEvolutionMilieuResidence();
        $evolutionDepartement = $this->getEvolutionDepartement();

        //$countlistDim = count($listDim);
       

        //dd($listNiveau);

        //dd($evolutionSexe);


        $annee1 =  "2015";
        $annee2 =  "2020";*/


        //  dd( $evolution);
        return view('admin/home');
    }


    /*



    public function update(Request $request)
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

                $annee1 =  "2015";
                $annee2 =  "2020";
            }
        } else {

            $annee1 =  "2015";
            $annee2 =  "2020";
        }


       
        $listAnnee = Annee::all()->sortBy("annee");
        $listsexe = Sexe::all();
        $listNiveau = Niveau_instruction::all();
        $listDim = Dimension::all();
        $listNiveau = Niveau_instruction::all();
        $listMilieu_residence = Milieu_residence::all();
        $listDepartement = Departement::all();
        
        */

    /*****************Evolution********************* */
    /*
        $evolutionAnnee = $this->getEvolutionAnnee("");
        $evolutionSexe = $this->getEvolutionSexe();
        $evolutionNivInstr = $this->getEvolutionNivInstruc();
        $evolutionMilieu_residence = $this->getEvolutionMilieuResidence();
        $evolutionDepartement = $this->getEvolutionDepartement();

        $countlistDim = count($listDim);

        //  dd( $evolution);
        return view('home', compact('listDim', 'countlistDim', 'listAnnee', 'evolutionAnnee','evolutionMilieu_residence','evolutionDepartement', 'listMilieu_residence', 'listDepartement', 'evolutionSexe', 'listsexe', 'listNiveau', 'evolutionNivInstr', 'annee1', 'annee2'));
    }



    

    public  function getEvolutionAnnee($dim)
    {

        return     DB::select('SELECT  annee ,dim.libelle as dimension, ea.taux as taux
                                    FROM  annees
                                    left join evolution_annees ea on annees.id = ea.annee_id
                                    left join dimensions dim on ea.dimenesion_id = dim.id
                                    GROUP BY annee, dim.libelle, ea.taux
                                ', [$dim]);

        //        where dim.libelle=?

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

    public  function getEvolutionNivInstruc()
    {

        return     DB::select('SELECT  n.id, n.libelle as niveau, en.taux as taux ,a.annee as annee, d.libelle as dimension
                                            FROM niveau_instructions n
                                            left join evolution_niv_instrucs en on n.id = en.niveau_instruction_id
                                            left join annees a on en.annee_id = a.id
                                            left join dimensions d on en.dimenesion_id = d.id
                                         
                                                                                 
                                ', []);
    }

    public  function getEvolutionDepartement()
    {

        return     DB::select('SELECT  dep.libelle as departement, ed.taux ,a.annee, d.libelle as dimension
                                            FROM departements dep
                                            left join evolution_departements ed on dep.id = ed.departement_id
                                            left join annees a on ed.annee_id = a.id
                                            left join dimensions d on ed.dimenesion_id = d.id
                                         
                                                                                 
                                ', []);
    }

    public  function getEvolutionMilieuResidence()
    {

        return     DB::select('SELECT  m.libelle as milieu, em.taux ,a.annee, d.libelle as dimension
                                            FROM milieu_residences m
                                            left join evolution_milieu_residences em on m.id = em.milieu_residence_id
                                            left join annees a on em.annee_id = a.id
                                            left join dimensions d on em.dimenesion_id = d.id
                                         
                                                                                 
                                ', []);
    }*/
}
