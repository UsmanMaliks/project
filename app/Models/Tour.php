<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city_from',
        'city_to',
        'distance',
        'tour_type',
        'season',
        'day',
        'image',
        'trip_date',
        'package_1',
        'package_2',
        'package_3',
        'max_person',
        'agency_id',
    ];

}
