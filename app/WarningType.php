<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningType extends Model
{
    protected $guarded = [
	'tipo',
	'nome',
	'pontos'
    ];

    protected $table = "warning_types";
/*
    public function advertencia(){
	return $this->hasMany('App\advertencia');
    }
*/
}
