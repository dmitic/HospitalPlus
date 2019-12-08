<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencija_lecenja extends Model
{
    protected $table = 'evidencija_lecenja';

    // Relacije
    public function karton(){
        return $this->hasOne('App\Karton', 'id', 'karton_id');
    }

    public function lekar(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function bolest(){
        return $this->hasOne('App\Bolest', 'id', 'bolest_id');
    }

    public function lek(){
        return $this->hasOne('App\Lek', 'id', 'lek_id');
    }
}
