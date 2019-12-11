<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacijent extends Model
{
    protected $table = 'pacijenti';
    protected $guarded = [];
    // Relacije
    public function izabraniLekar(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function karton(){
        return $this->hasOne(Karton::class);
    }
}
