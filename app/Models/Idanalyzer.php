<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idanalyzer extends Model
{
    use HasFactory;
     protected $fillable = [
        'reference', 'response_body'
    ];  
}
