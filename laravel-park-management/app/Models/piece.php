<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class piece extends Model
{
    use HasFactory;
    public function reparations()
    {
        return $this->belongsTo(panne::class);
    }
    public function technicien()
    {
        return $this->belongsTo(technicien::class);
    }
}