<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'com_id';
    protected $fillable = [
        'com_name','com_email','com_content','com_blog',
    ];
    public function blog(){
        return $this->belongsTo('App\Blog','com_blog','blog_id');
    }
}
