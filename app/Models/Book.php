<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ["title", "author","type_id", "user_id"]; 

    // Typeとの多対一のリレーションメソッドを定義
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Userとの多対一のリレーションメソッドを定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
