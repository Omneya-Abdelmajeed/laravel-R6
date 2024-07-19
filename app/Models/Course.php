<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //this property is used to specify the database table with that model.
    // as I can't name my model class bec. class is reserved by php 
    protected $table = 'classes';

    protected $fillable = [
        'className',
        'capacity',
        'isFulled',
        'price',
        'time_from',
        'time_to',
    ];
}
