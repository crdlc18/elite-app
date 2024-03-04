<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Album;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArtistAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Read CSV file
        $csvFile = public_path('albumSales.csv');
        $handle = fopen($csvFile, "r");

        if ($handle !== false) {
            $headers = fgetcsv($handle); // Get headers
            while (($data = fgetcsv($handle)) !== false) {
                $rowData = array_combine($headers, $data);
                // Check if artist already exists in the database
                $artist = Artist::where('name', $rowData['Artist'])->first();
                if (!$artist) {
                    // Artist does not exist, create a new one
                    $artist = Artist::create([
                        'code' => $faker->unique()->ean8,
                        'name' => $rowData['Artist'],
                    ]);
                }
                // Album data
                $album = Album::create([
                    'year' => $rowData['Date Released'],
                    'name' => $rowData['Album'],
                    'sales' => $rowData['2022 Sales'],
                    'artist_code'=> $artist->code,
                ]);

                $album->artist()->associate($artist)->save();
            }
            fclose($handle);
        }
    }
}
