<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_advertencia extends Model
{
    protected $guarded = [
	'tipo',
	'nome',
	'pontos'
    ];

    protected $table = "tipo_advertencia";
/*
    public function advertencia(){
	return $this->hasMany('App\advertencia');
    }
*/
}
