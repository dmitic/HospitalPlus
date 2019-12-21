<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karton extends Model
{
    protected $table = 'kartoni';
    protected $guarded = [];

    // Relacije
    public function pacijent(){
        return $this->hasOne('App\Pacijent', 'id', 'pacijent_id');
    }

    public function evLecenja(){
        return $this->hasMany(Evidencija_lecenja::class);
    }

    // Dobija se lekar preko modela Pacijent
    public function lekar(){
        return $this->hasOneThrough(User::class, Pacijent::class, 'id', 'id', null, 'user_id');
    }

}
