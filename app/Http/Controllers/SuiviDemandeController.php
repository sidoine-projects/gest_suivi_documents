<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\SuiviDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuiviDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'statut' => 'required|integer',
        //     'file' => 'nullable|mimes:pdf|max:2048',
        //     'demande_id' => 'required|exists:demandes,id',
        // ]);

        $user = Auth::user();
        // Récupérer l'utilisateur actuel et la demande
        $demande = Demande::find($request->input('demande_id'));

        // Gestion du fichier uploadé
        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $user->id . '_' . $demande->numero . '_' . $file->getClientOriginalName();
            $filePath = 'documents/' . $fileName;

            // Crée le dossier si nécessaire dans public
            if (!Storage::disk('public')->exists('documents')) {
                Storage::disk('public')->makeDirectory('documents');
            }

            // Stocke le fichier
            $file->storeAs('documents', $fileName, 'public');
        }

        // dd('Fonction store appelée');

        // Sauvegarde des informations du suivi de demande
        $suiviDemande = new SuiviDemande();
        $suiviDemande->statut = $request->input('statut');
        $suiviDemande->user_id = auth()->user()->id;
        $suiviDemande->demande_id = $request->input('demande_id');
        $suiviDemande->file = $fileName;
        $suiviDemande->save();

        // Mise à jour du statut de la demande
        $demande->statut = $request->input('statut');
        $demande->save();

        // dd($suiviDemande->statut);

        return redirect()->back()->with('insert', 'Enrégistrement éffectué avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suiviDemande = SuiviDemande::find($id);

        if (!$suiviDemande) {
            return redirect()->back()->with('error', 'Suivi de demande non trouvé.');
        }

        // Supprime le fichier associé si nécessaire
        if ($suiviDemande->file) {
            $filePath = 'documents/' . $suiviDemande->file;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }
        // Récupère la demande avant de supprimer le suivi
        $demande = $suiviDemande->demande;
        // Supprime l'entrée de la base de données
        $suiviDemande->delete();
        // Mise à jour du statut de la demande à 1
        if ($demande) {
            $demande->statut = 1;
            $demande->save();
        }

        return redirect()->back()->with('insert', 'Suivi de demande supprimé avec succès.');
    }

}
