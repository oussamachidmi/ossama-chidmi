<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_panne', 'id_technicien'
    ];

    public function panne()
    {
        return $this->belongsTo(panne::class);
    }
    public function technicien()
    {
        return $this->belongsTo(technicien::class);
    }
    public function reparations()
    {
        return $this->belongsToMany(piece::class);
    }
}