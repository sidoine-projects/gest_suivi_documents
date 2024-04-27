<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionMilieuResidence extends Model
{
    use HasFactory;

    protected $fillable = [

        'dimenesion_id',
        'annee_id',
        'milieu_residence_id',
        'taux',
    ];
}
