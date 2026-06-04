<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'sector',
        'job',
        'education',
        'location',
        'bio',
        'photo',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}