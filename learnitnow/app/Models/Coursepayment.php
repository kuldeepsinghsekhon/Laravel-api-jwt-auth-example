<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursepayment extends Model
{
    use HasFactory;
	  protected $fillable = [
        'user',
        'amount',
        'course',
        'subscriber',
		'status',
		'enrollment_key',
		'reference',
		'response'
    ];
}
