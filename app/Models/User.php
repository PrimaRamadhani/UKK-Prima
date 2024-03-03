<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\foto;
use App\Models\album;
use App\Models\follow;
use App\Models\komentar;
use App\Models\likefoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nama_lengkap',
        'no_telepon',
        'pictures',
        'bio',
        'alamat'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function foto()
    {
        return $this->hasMany(foto::class, 'user_id', 'id');
    }
    public function likefoto()
    {
        return $this->hasOne(likefoto::class, 'user_id', 'id');
    }
    public function komentar()
    {
        return $this->hasMany(komentar::class, 'user_id', 'id');
    }
    public function album()
    {
        return $this->hasMany(album::class, 'user_id', 'id');
    }
    public function follow()
    {
        return $this->hasMany(follow::class, 'user_id', 'id');
        return $this->belongsTo(follow::class, 'id', 'id');
    }
}
