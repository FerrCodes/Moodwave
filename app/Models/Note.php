<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'mood',
        'story',
        'song_title',
        'artist',
        'entry_date',
    ];

    // Relasi ke User (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}