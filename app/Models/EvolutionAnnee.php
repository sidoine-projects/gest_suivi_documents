<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionAnnee extends Model
{
    use HasFactory;

    protected $fillable = [

        'dimenesion_id',
        'annee_id',
        'taux',
    ];
}
