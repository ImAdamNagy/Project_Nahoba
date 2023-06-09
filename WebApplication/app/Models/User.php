<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;
use App\Models\Mechanic;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table ="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'firstname','lastname','tel','username','email','password','role_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UProducts()
    {
        return $this->hasMany(Product::class,"seller_id","id");
    }
    public function Role()
    {
        return $this->belongsTo(Role::class,"role_id","id");
    }
    public function ChatFrom()
    {
        return $this->hasMany(Chat::class,"from","id");
    }
    public function ChatTo()
    {
        return $this->hasMany(Chat::class,"to","id");
    }
    public function Mechanic(){
        return $this->hasOne(Mechanic::class,"user_id","id");
    }
}
