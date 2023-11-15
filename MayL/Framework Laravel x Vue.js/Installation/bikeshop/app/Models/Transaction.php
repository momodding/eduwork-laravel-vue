<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['member_id','grand_total','discount','pay','change','note','payment','userv_id'];

    public function transactionDetail()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
}
