<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $primaryKey = 'code';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artist) {
            $faker = Faker::create();
            do {
                // Generate a unique artist code using Faker
                $artist->code = $faker->unique()->ean8;
            } while (static::where('code', $artist->code)->exists());
        });
    }

    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_code', 'code');
    }


}
