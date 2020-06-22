<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = ['data', 'nome', 'animal_id'];

    public function animal()
    {
       	return $this->belongsTo('App\Animal');
    }
}
