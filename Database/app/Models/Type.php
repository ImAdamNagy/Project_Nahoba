<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    public $table = "types";
    protected $fillable = ["type"];

    public function TProducts()
    {
        return $this->hasMany(Product::class,"types_id","id");
    }
}
