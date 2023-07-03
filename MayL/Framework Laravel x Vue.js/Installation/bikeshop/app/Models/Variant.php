<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable =['name'];

    public function variants(){
        return $this->hasMany('App\Models\Product','variant_id');
    }
}
