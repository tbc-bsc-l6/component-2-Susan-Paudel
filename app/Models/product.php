<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //use factory that use faker to make fake data for sql for testig purpose
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     * The attributes that should be mutated to fillable.
     * @var array<int, string>
     */
    protected $fillable=['producttype',
    'mainname',
    'pdp',
    'firstname',
    'title',
    'price',
    'Image'];
}
