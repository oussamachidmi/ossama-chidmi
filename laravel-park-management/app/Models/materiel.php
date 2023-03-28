<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiel extends Model
{
    use HasFactory;

   protected $fillable = [
      'modele_id','contrat_id','poste_id'
   ];
    public function poste(){
       return $this->belongsTo(poste::class);
    }
    public function type(){
       return $this->belongsTo(type::class);
    }
    public function contrat(){
       return $this->belongsTo(contrat::class);
    }  
    public function modele(){
       return $this->belongsTo(modele::class);
    }
  
      public function pannes(){
       return $this->hasMany(panne::class);
    }  
    
}