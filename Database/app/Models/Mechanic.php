<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Mechanic extends Model
{
    public $timestamps = false;
    protected $table = "mechanic";

    protected $fillable=["introduction","country","postal_code","city","address","profile_pic","user_id","profession"];

    public function User(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
