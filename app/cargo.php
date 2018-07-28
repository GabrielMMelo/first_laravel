<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    protected $guarded = [
	'id',
	'name',
	'direx'
    ];

    protected $table = "cargo";
}
