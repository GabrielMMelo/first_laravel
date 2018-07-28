<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = [
        'id',
        'id_warning',
        'status',
    ];

    protected $table = "logs";
}
