<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->hasMany(product::class);
    }
}
