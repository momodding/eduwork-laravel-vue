<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'catalog_id');
    }
}
