<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendarServico extends Model
{
    protected $fillable = ['data','hora', 'servico_id', 'animal_id'];

}
