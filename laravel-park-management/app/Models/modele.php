<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modele extends Model
{
    use HasFactory;
   protected $fillable = [
      'libelle','year','marque_id','type'
   ];

    public function marque(){
       return $this->belongsTo(marque::class);
    } 
    public function materiels(){
       return $this->hasMany(materiel::class);
    }
    public function pieces(){
       return $this->hasMany(pieces::class);
    }
     public function type(){
       return $this->belongsTo(type::class);
    }
    public function caracters(){
       return $this->hasMany(caracter::class);
    }
    
    
}