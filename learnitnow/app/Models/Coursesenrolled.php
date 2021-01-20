<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursesenrolled extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subscriber',
        'student',
        'course',
        'enrollment_key',
        'created_at',
        'completed_on',
        'status',
        'gyft_id',
        'reedem_url',
        'redeem_status',
    ];

    public function getCourse(){
        return Course::find($this->course);
    }
}
