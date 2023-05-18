<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'status', 'date_start','date_end'];

    public function transactionDetail()
    {
        return $this->hasOne('App\Models\TransactionDetail', 'transaction_id');
    }
}
