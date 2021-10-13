<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamp = false;
    protected $fillable =[
        'title','slug','image','created_at'
    ];
}

