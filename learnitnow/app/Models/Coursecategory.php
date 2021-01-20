<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursecategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'image',
        'thumbnail',
        'user_id'
    ];


    public function getCategory($name){
        $category = self::where('name', $name)->first();
        return $category->id;
    }
	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
