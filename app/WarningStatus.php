<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarningStatus extends Model
{
    protected $guarded = [
	'id',
	'name'
    ];

    protected $table = "warning_status";
}
