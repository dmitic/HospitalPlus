<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lek extends Model
{
    protected $table = 'lekovi';
    public $timestamps = false;
    protected $guarded = [];
}
