<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematique extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'code',
        'thematique',
    ];

    public function actuliteAdmins(){

        return $this->hasMany(ActualiteAdmin::class);
    }
}
