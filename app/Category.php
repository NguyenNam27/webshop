<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public $timestamp = false;
    protected $fillable = [
        'name','slug','created_at','image'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
