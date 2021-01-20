<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'retakes','description','course'];
    
    public function getQuestions(){
      return Question::where('exam', $this->id)->get();      
    }
}
