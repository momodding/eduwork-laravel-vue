<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'catalog_id');
    }
}
