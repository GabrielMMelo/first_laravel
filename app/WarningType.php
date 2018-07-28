<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningType extends Model
{
    protected $guarded = [
	'type',
	'name',
	'points'
    ];

    protected $table = "warning_types";
/*
    public function Warning(){
	return $this->hasMany('App\Warning');
    }
*/
}
