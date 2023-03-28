<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\matches;

class contrat extends Model
{
    use HasFactory;

    public function fornisseur(){
        return $this->belongsTo(fornisseur::class);
    }
    public function materiels(){
        return $this->hasmany(materiel::class);
    }
}