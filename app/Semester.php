<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
        protected $guarded = [
            'id',
            'begin',
            'end',
            'semester_number',
        ];

        protected $table = "semesters";
}
