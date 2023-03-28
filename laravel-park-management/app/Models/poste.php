<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poste extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'salle_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function materiels()
    {
        return $this->hasMany(Materiel::class);
    }
    public function salle()
    {
        return $this->belongsTo(salle::class);
    }
}