<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membro extends Model
{
    protected $guarded = [
	'nome',
	'cargoId',
	'email',
	'pass'
    ];

    protected $table = "membro";
}
