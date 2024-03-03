<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'foto_id',
        'isi_komentar'
    ];

    protected $table = 'komentar';

    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
