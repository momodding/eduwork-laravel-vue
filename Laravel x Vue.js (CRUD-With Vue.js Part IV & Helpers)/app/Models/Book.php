<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'year', 'created_at', 'publisher_id', 'author_id', 'catalog_id', 'qty', 'price'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'book_id');
    }
}
