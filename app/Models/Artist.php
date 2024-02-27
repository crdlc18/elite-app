<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $primaryKey = 'code';


    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_code', 'code');
    }


}
