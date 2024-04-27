<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalite_categorie extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'libelle',
        'categorie_id',

    ];
}
