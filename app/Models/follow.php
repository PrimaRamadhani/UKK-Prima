<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    use HasFactory;

    protected $fillable =[
        'users_id',
        'follow_id'
    ];

    protected $table = 'follow';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
        return $this->hasMany(User::class, 'follow_id', 'id');

    }
}
