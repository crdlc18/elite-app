<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'name',
        'sales',
        'album_cover'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_code', 'code');
    }

}
