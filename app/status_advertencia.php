<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_advertencia extends Model
{
    protected $guarded = [
	'id',
	'nome'
    ];

    protected $table = "status_advertencia";
}
