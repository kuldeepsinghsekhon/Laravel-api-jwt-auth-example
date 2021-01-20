<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id',
        'name',
        'title',
        'email',
        'city',
        'state',
    ];

}
