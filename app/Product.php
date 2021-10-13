<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','category_id','slug','image','stock','price','sale','created_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    // public function post()
    // {
    //     return $this->belongsTo('App\Post');
    // }
}
