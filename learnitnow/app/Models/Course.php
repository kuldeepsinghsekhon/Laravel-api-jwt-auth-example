<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'boardcertified',
        'certification',
        'degree',
        'cecredit',
        'prerequisites',
        'specialization',
        'price',
        'custom_url',
        'commision',
        'sale_price',
        'image',
        'logos',
        'product',
        'duration',
        'period',
        'description',
        'pennfoster',
        'authoritylabel',
        'status',
        'coursecategory_id',
        'instructor',
        'video',
        'youtubelink',
        'viewtype',
        'videotype',
        'type',
        'syndicate',
        'syndicate_approval',
    ];

    public function getChapters(){
        return Coursechapter::where('course' , $this->id)->get();
    }

    public function getCategory($id){
        $category = Coursecategory::where('id' , $id)->count();
        if( $category > 0){
        return Coursecategory::where('id' , $id)->first();
        }else{
            return Coursecategory::where('id' , 1)->first();;
        } 
    }

    public function getInstructor($id){
       
        return Instructor::where('id' , $id)->first();
    }
	public function getExcerptAttribute()
    {
        return Str::limit(html_entity_decode($this->description),250);
    }

}
