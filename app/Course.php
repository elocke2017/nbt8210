<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable =[
        'imagePath',
        'title',
        'description',
        'price',
        'participants',
        'participant_limit',
        'instructor',
        'courseType'
    ];
}
