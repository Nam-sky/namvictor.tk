<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    protected $fillable = [
        'name','image',
    ];
    public function blog(){
        return $this->hasMany('App\Blog');
    }
}
