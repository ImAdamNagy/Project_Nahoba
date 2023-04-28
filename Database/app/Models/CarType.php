<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class CarType extends Model
{
    public $timestamps = false;
    protected $table = "carTypes";
    protected $fillable = ["name", "year"];

    public function CarTypesProducts()
    {
        return $this->hasmany(Product::class,"car_typeId","id");
    }
}