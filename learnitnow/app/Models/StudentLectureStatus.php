<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLectureStatus extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'chapter_id','lecture_id','course_id','study_status','status'];
    
}
