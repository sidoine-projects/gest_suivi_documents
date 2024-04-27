<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionSexe extends Model
{
    use HasFactory;

    protected $fillable = [

        'dimenesion_id',
        'annee_id',
        'sexe_id',
        'taux',
    ];
}
