<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public function pessoasRelacionadas($query)
    {
        return $query->where('localidade', 'like', $localidade);
    }
}
