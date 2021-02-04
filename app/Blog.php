<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    protected $fillable = [
        'blog_name','blog_slug','cate_blog','thumbnail','mota','content','views',
    ];
    public function cate(){
        return $this->belongTo('App\Category');
    }
}
