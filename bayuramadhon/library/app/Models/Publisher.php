<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{

    protected $fillable = ['name', 'email', 'phone_number', 'address'];


    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}
