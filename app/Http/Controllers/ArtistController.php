<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;


class ArtistController extends Controller
{
    //for displaying artists, total sales, their albums and albums sales,
    public function index(){
        $artistsDeets = Artist::with('albums')
            ->withSum('albums as totsales', 'sales')
            ->get();

        return  view('artists', ['artists'=>$artistsDeets]);
    }

    //store new artist
    public function store(Request $request){

        $artist = Artist::create([
            'name' => $request->newArtist
        ]);

        return redirect()->route('artist.index', $artist)->with('success', 'Artist created successfully.');
    }
    
    //delete an artist
    public function destroy(Artist $artist) {  
        $artist->delete();
        return redirect()->route('artist.index')->with('success', 'Artist deleted successfully.');
    }
}
