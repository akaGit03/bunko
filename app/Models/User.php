<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**  adminアカウントの判定 */
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === config('filament.id')) {
            return (bool) $this->admin;
        }
 
        return true;
    }

    /** リレーションメソッド */

    // Bookとの一対多のリレーション
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Lendingとの一対多のリレーション
    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }

    // Commentとの一対多のリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /* ユーザーが現在借りている本（返却されていない本）のレコードの取得
    public function currentBorrows()
    {
        return $this->hasMany(Lending::class)->whereNull('return_date');
    }
    */
}
