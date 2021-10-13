<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public $fillable =['name','phone','email','contents','created_at'];
}
