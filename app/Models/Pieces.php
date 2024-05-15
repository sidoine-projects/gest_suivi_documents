<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieces extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'piece',
        'typepiece_id',
        'montant',
        
    ];
    public function typePiece()
    {
        return $this->belongsTo(TypePiece::class, 'typepiece_id');
    }
}
