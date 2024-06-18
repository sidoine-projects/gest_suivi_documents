<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Pieces;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('role');
    // }

    public function index()
    {
        $user = auth()->user();

        // Récupérer les demandes de l'utilisateur authentifié
        $demandes = Demande::where('user_id', $user->id)
        ->with('suiviDemande')
        ->get();
        return view("admin.demandes.index", compact("demandes"));

    }

    public function indexAdmin()
    {
        // $demandes = Demande::all();
        $demandes = Demande::with('suiviDemande')->get();
        return view("admin.demandes.index-admin", compact("demandes"));
    }


    public function create()
    {
        $code = $this->generateUniqueCode();

        $roleName = auth()->user()->role_name;
        // Récupérer les pièces en fonction du rôle
        if ($roleName == 'etudiant') {
            $pieces = Pieces::where('id', 1)->get();
        } elseif ($roleName == 'enseignant') {
            $pieces = Pieces::where('id', 2)->get();
        } else {
            $pieces = Pieces::all();
        }
        return view('admin.demandes.demandes', compact("pieces", "code"));
    }

    private function generateUniqueCode()
    {
        do {
            // Générer un nombre aléatoire à 6 chiffres
            $code = mt_rand(100000, 999999);
            // Vérifier si le code est déjà utilisé dans la base de données
            $existingDemande = Demande::where('numero', $code)->first();
        } while ($existingDemande);

        return $code;
    }
    public function getMontant(Request $request)
    {
        $pieceId = $request->input('piece_id');

        // Recherchez la pièce correspondante par son ID
        $piece = Pieces::find($pieceId);

        // Vérifiez si la pièce existe
        if ($piece) {
            // Si la pièce existe, récupérez le montant associé
            $montant = $piece->montant;
            return response()->json(['montant' => $montant]);
        } else {
            // Si la pièce n'existe pas, retournez une erreur ou une valeur par défaut
            return response()->json(['error' => 'La pièce n\'existe pas'], 404);
        }
    }

    public function save(Request $request)
    {

        $numero = $request->numero;
        $piece_id = $request->piece_id;
        $montant = $request->montant;
        $description = $request->description;
        $transaction_status = $request->{'transaction-status'};
        $transaction_id = $request->{'transaction-id'};


        if ($transaction_status == "approved") {
            // Créer une nouvelle demande
            $demande = new Demande();
            $demande->piece_id = $piece_id;
            $demande->user_id = auth()->user()->id; // Assurez-vous que l'utilisateur est authentifié
            $demande->statut = '1';
            $demande->description = $description;
            $demande->numero = $numero;
            $demande->is_payed = true; // Ou false selon votre logique de paiement

            $demande->save();

            // return redirect()->back()->with('success', 'Demande enregistrée avec succès.');
            return redirect()->route('demandes')->with('insert', 'Demande enregistrée avec succès.');

        } else {
            return redirect()->back()->with('error', 'Demande échouée.');
        }

    }

    public function show(Demandes $demande)
    {
        return view('admin.demandes.show', compact('demande'));
    }

    public function update(Request $request, $id)
    {
        // Logique de mise à jour de la demande ici
    }

    public function delete($id)
    {
        // Logique de suppression de la demande ici
    }
}
