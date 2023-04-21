<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $timestamps = false;
    protected $table = "chats";

    public function From()
    {
        return $this->belongsTo(User::class,"from","id");
    }
    public function To()
    {
        return $this->belongsTo(User::class,"to","id");
    }
}
