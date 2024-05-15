<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pieces;
class TypePiece extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'typepiece',
        
    ];
    public function pieces()
    {
        return $this->hasMany(Pieces::class);
    }
}
