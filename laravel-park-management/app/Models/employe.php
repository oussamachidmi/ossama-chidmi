<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(user::class);
    }
    public function pannes(){
        return $this->hasmany(panne::class);
    }
}