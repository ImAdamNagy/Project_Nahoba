<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;
use App\Models\CarType;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "products";
    
    protected $fillable = ["seller_id", "product_name", "product_price", "types_id", "car_typeId", "product_img", "product_description", "product_location","product_enable"];

    public function Seller()
    {
        return $this->belongsTo(User::class,"seller_id","id");
    }
    public function Type()
    {
        return $this->belongsTo(Type::class,"types_id","id");
    }
    public function CarType()
    {
        return $this->belongsTo(CarType::class,"car_typeId","id");
    }
}
