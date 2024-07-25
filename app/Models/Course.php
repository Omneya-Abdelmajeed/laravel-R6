<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

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
