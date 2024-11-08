<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'checkout_date',
        'due_date',
        'return_date'
    ];
    
    /** リレーションメソッド */

    // Bookとの多対一のリレーション
    public function Book()
    {
        return $this->belongsTo(Book::class);
    }

    // Userとの多対一のリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
