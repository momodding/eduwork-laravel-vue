<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['isbn', 'title', 'year', 'qty', 'price'];


    public function publishers()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function authors()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function catalogs()
    {
        return $this->belongsTo('App\Models\catalog', 'catalog_id');
    }
}
