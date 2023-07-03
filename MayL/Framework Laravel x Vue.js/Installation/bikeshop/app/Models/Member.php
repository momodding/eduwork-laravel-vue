<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name','gender','address','email'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction', 'transaction_id');
    }
}
