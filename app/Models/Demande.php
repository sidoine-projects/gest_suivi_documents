<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SuiviDemande;
use App\Models\Pieces;
use App\Models\User;

class Demande extends Model
{
    
    use HasFactory;
    protected $fillable = [
        
        'piece_id',
        'user_id',
        'date',
        'statut',
        'description',
        'numero',
        'is_payed',

    ];

    public function piece()
    {
        return $this->belongsTo(Pieces::class, 'piece_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function suiviDemande()
    {
        return $this->hasOne(SuiviDemande::class);
    }
}
