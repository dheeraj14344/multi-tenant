<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'industry',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
