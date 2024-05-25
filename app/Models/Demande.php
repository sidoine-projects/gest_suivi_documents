<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
