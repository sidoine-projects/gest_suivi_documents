<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Signalisation extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'categorie_id',
        'user_id',
        'image',
        'arrondissement',
        'quartier',
        'commentaire',
        'rp',
        'pdp',
        'longitude',
        'latitude',
        'url_gps',
        'resolue'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
