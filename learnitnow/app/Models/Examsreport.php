<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examsreport extends Model
{
    use HasFactory;
    protected $fillable = [ 'subscriber', 'course','exam','student', 'score', 'correctlyAnswered', 'totalQuestions'];
    
}
