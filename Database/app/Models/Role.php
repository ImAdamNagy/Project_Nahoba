<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $table = "roles";
    protected $fillable = [ 'id', 'role_name'];

    public function Users()
    {
        return $this->hasMany(User::class,"role_id","id");
    }
}
