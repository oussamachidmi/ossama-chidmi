<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caracter extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(type::class);
    }
 
}