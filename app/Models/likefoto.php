<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class likefoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'foto_id'
    ];
    protected $table = 'likefoto';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id', 'id');
    }
}
