<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panne extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id', 'materiel_id', 'description'
    ];
    
    public function materiel()
    {
        return $this->belongsTo(Materiel::class);
    }
    public function employe()
    {
        return $this->belongsTo(user::class,'emp_id');
    }
    public function reparation()
    {
        return $this->hasOne(reparation::class ,'id_panne');
    }
}