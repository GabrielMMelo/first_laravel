<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membro extends Model
{
    protected $guarded = [
	'nome',
	'job',
	'cpf',
	'rg',
	'email',
	'pass'
    ];

    protected $table = "membro";
}
