<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'body'
    ];

    /** リレーションメソッド */

    // Bookとの多対一のリレーション
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Bookとの多対一のリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
