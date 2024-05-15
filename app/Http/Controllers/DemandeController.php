<?php

namespace App\Http\Controllers;

use App\Models\Demandes;
use App\Models\Pieces;
use Illuminate\Http\Request;



class DemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $demandes = Demandes::all();
        return view("admin.demandes.index", compact("demandes"));
    }

    public function create()
    {
        $code = $this->generateUniqueCode();
        $pieces = Pieces::all();
        return view('admin.demandes.demandes', compact("pieces", "code"));
    }

    private function generateUniqueCode()
    {
        do {
            // Générer un nombre aléatoire à 6 chiffres
            $code = mt_rand(100000, 999999);
            // Vérifier si le code est déjà utilisé dans la base de données
            $existingDemande = Demandes::where('numero', $code)->first();
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
        // Récupérer les données de la requête
        $id = $request->id;
        $piece_id = $request->piece_id;
        $users_id = $request->users_id; // Correction ici
        $date = $request->date;
        $statut = $request->statut;

        // Recherchez si la demande existe déjà
        $findDemandes = Demandes::where('id', $id)->first();

        // Si la demande n'existe pas, créez une nouvelle instance et enregistrez-la
        if (!$findDemandes) {
            $demande = new Demandes();
            $demande->id = $id;
            $demande->piece_id = $piece_id;
            $demande->users_id = $users_id;
            $demande->date = $date;
            $demande->statut = $statut;
            $demande->save();

            return redirect()->back()->with('success', 'Demande enregistrée avec succès.');
        } else {
            // Si la demande existe déjà, retournez avec un message d'erreur
            return redirect()->back()->with('error', 'La demande existe déjà.');
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
