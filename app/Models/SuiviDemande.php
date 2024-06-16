<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demande;
use App\Models\User;


class SuiviDemande extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
        'file',
        'user_id',
        'demande_id',
    ];

    /**
     * Get the user that owns the suivi_demande.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the demande that owns the suivi_demande.
     */
    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

}
