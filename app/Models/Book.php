<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "author",
        "type_id",
        "user_id",
        "comment",
        "status",
    ]; 

    // Typeとの多対一のリレーションメソッドを定義
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Userとの多対一のリレーションメソッド
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Lendingとの一対多のリレーションメソッド
    public function lending()
    {
        return $this->hasMany(Lending::class);
    }

    // 本が貸出中か否かの判定
    public function isLent()
    {
        return $this->lending()->where('user_id', \Auth::id())->whereNull('return_date')->exists();
    }

    // 貸出中のレコードの取得
    public function currentLending()
    {
        return $this->hasOne(Lending::class)->whereNull('return_date');
    }
}
