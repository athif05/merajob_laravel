<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function BlogCategory() {

    	return $this->belongsToMany(BlogCategory::class);
    }


    public static function blogsCount($category_id) {

    	$blogsCount= Blog::where(['blog_category_id'=>$category_id, 'status'=>'1', 'is_deleted'=>'0'])->count();

    	return $blogsCount;
    }

}
