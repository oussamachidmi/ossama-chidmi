<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salle extends Model
{
    use HasFactory;
    
    public function services (){
       return $this->BelongsToMany(Service::class);
    }
    public function postes()
    {
        return $this->hasMany(Poste::class);
    }
};