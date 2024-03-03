<?php

namespace App\Models;

use App\Models\User;
use App\Models\album;
use App\Models\komentar;
use App\Models\likefoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'album_id',
        'judul_foto',
        'deskripsi_foto',
        'url'
    ];

    protected $table = 'foto';

    //relasi
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function likefoto()
    {
        return $this->hasMany(likefoto::class, 'foto_id', 'id');
    }
    public function komentar()
    {
        return $this->hasMany(komentar::class, 'foto_id', 'id');
    }
    public function album()
    {
        return $this->belongsTo(album::class, 'album_id', 'id');
    }

}
