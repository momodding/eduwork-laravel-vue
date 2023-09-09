<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','variant_id','qty','price'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\Variant','variant_id');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Models\Cart','product_id');
    }
}
