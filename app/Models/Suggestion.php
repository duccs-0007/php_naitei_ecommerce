<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', true);
    }

    public function scopeUnaccept($query)
    {
        return $query->where('status', false);
    }
}
