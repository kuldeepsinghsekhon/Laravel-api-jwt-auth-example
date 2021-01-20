<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursechapter extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'course',
        'title',
        'description',
        'indexing',
    ];

    public function getLectures(){
        return Lecture::where(['chapter' => $this->id, 'course' => $this->course])->get();
    }

    public function getLectureStatus($userId, $chapterId, $lectureId){
        $studenLecStatus = StudentLectureStatus::where(['user_id' => $userId, 'chapter_id' => $chapterId, 'lecture_id' => $lectureId])->first();        
        if($studenLecStatus != ''){
            return $studenLecStatus->study_status;
        }
        
    }
}