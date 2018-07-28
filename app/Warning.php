<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    protected $guarded = [
	'id',
	'type',
	'penalized',
	'responsible',
	'date',
	'time',
	'description',
	'status'
    ];

    protected $table = "warnings";
/*
    public function warningType(){
    	return $this->belongsTo('App\warningType');
    }
*/
}
