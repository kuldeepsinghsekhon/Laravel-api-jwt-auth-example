<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentexamresult extends Model
{
    use HasFactory;
    protected $fillable = [ 'course', 'exam','question','answer','correct','indexing','student'];
    
}
