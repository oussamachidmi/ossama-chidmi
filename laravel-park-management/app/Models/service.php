<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];

/**
         * Get all of the comments for the services
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function salles()
        {
            return $this->belongsToMany(salle::class);
        } 
        public function users()
        {
            return $this->hasMany(user::class);
        }
        
        
    }