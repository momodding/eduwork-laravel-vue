<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'date_start', 'date_end'];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'transaction_id');
    }
}
