<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','ville','telephone','mail'
    ];


    public function materiels()
    {
       return $this->hasMany(contrat::class);
    }
}