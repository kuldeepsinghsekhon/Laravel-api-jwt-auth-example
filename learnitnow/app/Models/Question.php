<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [ 'choices', 'couses','exam','question','answers','correct','indexing','required'];
    
    public function getAnswer(){                
        // $allChoices = []; 
        // foreach (array_combine(json_decode($this->answers), json_decode($this->correct)) as $answer => $correct){
        //     $allChoices[] = (object) array("answer" => $answer, "correct" => $correct);
        // }
        // return $allChoices;
        return json_decode($this->answers);        
    }

    public function getCorrect(){        
        return json_decode($this->correct);                
    }
}
