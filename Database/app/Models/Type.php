<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    public $table = "types";

    public function TProducts()
    {
        return $this->hasMany(Product::class,"type_id","id");
    }
}
