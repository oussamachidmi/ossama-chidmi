<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    public function modeles()
    {
        return $this->hasMany(modele::class);
    }
    public function caracters()
    {
        return $this->hasMany(caracter::class);
    }  
    
}