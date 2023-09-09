<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $fillable = ['member_id','product_id','qty'];

    public function cart()
    {
        return $this->belongsToMany('App\Models\Product','product_id');
    }
}
