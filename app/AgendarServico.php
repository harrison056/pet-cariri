<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendarServico extends Model
{
<<<<<<< Updated upstream
    protected $fillable = ['data','hora', 'servico_id', 'animal_id'];
=======
    protected $fillable = ['data','hora', 'servico_id', 'animal_id', 'user_id'];

    public function servico()
    {
       	return $this->hasMany('App\Servico');
    }
>>>>>>> Stashed changes

}
