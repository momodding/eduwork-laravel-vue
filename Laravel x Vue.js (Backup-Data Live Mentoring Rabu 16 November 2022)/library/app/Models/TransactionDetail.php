<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'book_id', 'qty', 'isbn'];

    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_detail_id');
    }
}
