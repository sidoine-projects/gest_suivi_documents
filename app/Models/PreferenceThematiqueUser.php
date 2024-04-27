<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferenceThematiqueUser extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'thematique_id',

    ]; 

    /*public function thematique(){
        return $this->belongsTo(Thematique::class);
    }*/


    public function setUserAttribute($value)
    {
        $this->attributes['thematique'] = json_encode($value);
    }

    public function getThematiqueAttribute($value)
    {
        return $this->attributes['thematique'] = json_decode($value);
    }



}
