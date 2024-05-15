<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
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
}
