<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
<<<<<<< Updated upstream
    protected $fillable = ['nome',  'user_id'];
=======
    protected $fillable = ['nome', 'preco', 'user_id'];

    public function agendarServico()
    {
        return $this->belongsTo('App\AgendarServico');
    }
>>>>>>> Stashed changes
}
