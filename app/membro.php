<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membro extends Model
{
    protected $guarded = [
	'nome',
	'cargo',
	'mail',
	'telefone'
    ];

    protected $table = "membros";
}
