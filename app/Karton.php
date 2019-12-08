<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karton extends Model
{
    protected $table = 'kartoni';

    // Relacije
    public function pacijent(){
        return $this->hasOne('App\Pacijent', 'id', 'pacijent_id');
    }

    public function evLecenja(){
        return $this->hasMany(Evidencija_lecenja::class);
        // return $this->hasMany('App\Evidencija_lecenja', 'karton_id', 'id');
    }

    // Dobija se lekar preko modela Pacijent
    public function lekar(){
        return $this->hasOneThrough(User::class, Pacijent::class, 'id', 'id', null, 'user_id');
        // return $this->hasOneThrough('App\User', 'App\Pacijent', 'id', 'id', null, 'user_id');
    }
}
