<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advertencia extends Model
{
    protected $guarded = [
	'id',
	'tipo',
	'penalizado',
	'responsavel',
	'data',
	'hora',
	'descricao',
	'status'
    ];

    protected $table = "advertencia";
/*
    public function tipo_advertencia(){
    	return $this->belongsTo('App\tipo_advertencia');
    }
*/
}
