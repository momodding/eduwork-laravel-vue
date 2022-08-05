<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'year', 'qty', 'price',];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'book_id');
    }
}
