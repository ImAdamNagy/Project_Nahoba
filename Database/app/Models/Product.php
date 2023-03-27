<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Type;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "products";
    protected $fillable = ["product_name", "product_price", "types_id", "product_img", "product_description", "product_location"];

    public function User()
    {
        return $this->belongsTo(User::class,"seller_id","id");
    }
    public function Type()
    {
        return $this->belongsTo(Type::class,"type_id","id");
    }
}
