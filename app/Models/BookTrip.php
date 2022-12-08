<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'package'
    ];
}
