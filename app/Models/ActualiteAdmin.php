<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualiteAdmin extends Model
{
    use HasFactory;

    protected $fillable = [

        'thematique_id',
        'image',
        'titre',
        'description',
        'auteur',
        'alaune',
        'nbrview',
        'arrondissement',
        'quartier',
       
    ]; 


    public function thematique(){
        return $this->belongsTo(Thematique::class);
    }

    

}
