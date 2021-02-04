<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class library extends Model
{
    protected $table = 'library';
    protected $primaryKey = 'library_id';
    protected $fillable = [
        'library_name',
    ];
}
