<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionNivInstruc extends Model
{
    use HasFactory;

    protected $fillable = [

        'dimenesion_id',
        'annee_id',
        'niveau_instruction_id',
        'taux',
    ];
}
