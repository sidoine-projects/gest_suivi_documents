<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demande;
use App\Models\SuiviDemande;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role');

    //     // $this->middleware('Auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('admin/site/index');
    }

    public function index()
    {
        //
        $totalUser = User::all()->count();
        $totalEnseignant = User::where('role_name', 'enseignant')->count();
        $totalEtudiant = User::where('role_name', 'etudiant')->count();
        $date = Carbon::today(); // Date d'aujourd'hui
        $totalDemande = Demande::whereDate('created_at', Carbon::today())->count();
        $totalSuiviDemande = SuiviDemande::whereDate('created_at', $date)->count();
        //dd( $totalSondage);

        $today = Carbon::today();
        // Calculer le montant total des demandes par enseignant pour la journée actuelle
        $totalDemandesEnseignant = DB::table('demandes')
            ->join('users', 'demandes.user_id', '=', 'users.id')
            ->join('pieces', 'demandes.piece_id', '=', 'pieces.id')
            ->where('users.role_name', 'enseignant')
            ->whereDate('demandes.created_at', $today)
            ->sum('pieces.montant');

        // Calculer le montant total des demandes par étudiant pour la journée actuelle
        $totalDemandesEtudiant = DB::table('demandes')
            ->join('users', 'demandes.user_id', '=', 'users.id')
            ->join('pieces', 'demandes.piece_id', '=', 'pieces.id')
            ->where('users.role_name', 'etudiant')
            ->whereDate('demandes.created_at', $today)
            ->sum('pieces.montant');

        //$annee = User::select('created_at')->get();
        $years = User::select(DB::raw("(DATE_FORMAT(created_at, '%Y')) as year"))
            ->orderBy('year')
            ->groupBy('year')
            ->get();

        $users_year = User::select(

            DB::raw("(count(id)) as total"),
            DB::raw("(DATE_FORMAT(created_at, '%Y')) as year")
        )
            ->orderBy('year')
            ->groupBy('year')
            ->get();

        //dd( $years);
        # code...
        // Année en cours
        $currentYear = Carbon::now()->year;

        // Tableau pour stocker les données par mois
        $data = [
            'en_cours' => [],
            'approuvé' => [],
            'rejeté' => [],
        ];

        // Boucle sur chaque mois de l'année
        for ($month = 1; $month <= 12; $month++) {
            // Date de début et de fin du mois
            $startOfMonth = Carbon::createFromDate($currentYear, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate($currentYear, $month, 1)->endOfMonth();

            // Récupérer les demandes en cours, approuvées et rejetées pour le mois
            $demandesEnCours = Demande::where('statut', '1')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->count();

            $demandesApprouvees = Demande::where('statut', '2')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->count();

            $demandesRejetees = Demande::where('statut', '3')
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->count();

            // Stocker les données dans le tableau par mois
            $data['en_cours'][] = $demandesEnCours;
            $data['approuvé'][] = $demandesApprouvees;
            $data['rejeté'][] = $demandesRejetees;
        }

        return view('admin/home', compact('totalDemandesEtudiant', 'totalDemandesEnseignant', 'users_year', 'data', 'years', 'totalEtudiant', 'totalUser', 'totalEnseignant', 'totalSuiviDemande', 'totalDemande'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
