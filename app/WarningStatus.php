<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningStatus extends Model
{
    protected $guarded = [
	'id',
	'nome'
    ];

    protected $table = "warning_status";
}
