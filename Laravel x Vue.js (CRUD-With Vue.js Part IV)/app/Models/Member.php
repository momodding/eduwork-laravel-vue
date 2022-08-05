<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'phone_number', 'address', 'email'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'member_id');
    }
}
