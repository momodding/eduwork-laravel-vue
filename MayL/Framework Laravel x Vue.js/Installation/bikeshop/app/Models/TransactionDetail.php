<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id','product_id','qty','price','total'];

    public function transaction():BelongsTo{
        return $this->belongsTo('App\Models\Transaction','transaction_id');
        //return $this->belongsTo(TransactionDetail::class);
    }
}
