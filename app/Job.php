<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [
	'id',
	'name',
	'direx'
    ];

    protected $table = "jobs";
}
