<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;



class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        // total number of albums per artist
        $artists = Artist::withCount(['albums as total_albums'])->get();

        //combined album sales per artist
        $salesPerArtist = Artist::withSum('albums', 'sales')->get();

        //top artist
        $topArtist = Artist::select('code', 'name')
            ->withSum('albums as total_sales', 'sales')
            ->orderByDesc('total_sales')
            ->first();

        
        // Default value for searched artist
        $searchedArtist = '';

        // Retrieve the searched artist name from user input if there is already a submitted name
        if ($request->has('artist_name')) {
            $searchedArtist = $request->input('artist_name');
        }

        //list of albums by searched name
        $albums = [];
        if ($searchedArtist) {
            $albums = Album::whereHas('artist', function($query) use ($searchedArtist) {
                $query->where('name', $searchedArtist);
            })->get();
        }
        // Return the dashboard view with the data
        return view('dashboard', [
            'artists' => $artists,
            'salesPerArtist' => $salesPerArtist,
            'topArtist' => $topArtist,
            'searchedArtist' => $searchedArtist,
            'albums'=>$albums,
        ]);
    }

}
