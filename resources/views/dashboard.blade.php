@extends('layout')
@section('title', 'ElitePlayer | Dashboard')
@section('content')

<div class="dashCon">
    <div class="row">
        <div class="col-md-4">
            <div class="longbox">
                <h5>Artist <span class="right">Total Albums</span></h5>
                <div class="list">
                    <ul class="dashUl">
                        @foreach ($artists as $artist)
                            <li>{{ $artist->name }} <span class="right">{{ $artist->total_albums }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="longbox">
                <h5>Artist <span class="right">Total Album  Sales</span></h5>
                <div class="list">
                    <ul class="dashUl">
                        @foreach ($salesPerArtist as $sales)
                            <li>{{ $sales->name }} <span class="right">{{ number_format($sales->albums_sum_sales, 0, '.', ',') }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="shortbox">
                        <img src="https://cdn-icons-png.flaticon.com/512/2908/2908584.png" id="topArtistImg"/>
                        <h3>Top Artist</h3>
                        @if ($topArtist)
                            <p><b>{{ $topArtist->name }}</b> has the highest combined <br>album sales ( {{ $topArtist->total_sales }} )</p>
                        @else
                            <p>No data available</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shortbox">
                        <form id="dashform" action="{{ route('dashboard') }}" method="GET">
                            <input type="text" name="artist_name" placeholder="Enter artist name">
                            <button type="submit">Search</button>
                        </form>
                        @if ($searchedArtist)
                            <h3>Albums by {{ $searchedArtist }}</h3>
                            <div class="shortlist">
                                @if ($albums->isEmpty())
                                    <p>No albums found for {{ $searchedArtist }}</p>
                                @else
                                    <ul>
                                        @foreach ($albums as $album)
                                            <li>
                                                <img src="https://cdn-icons-png.flaticon.com/512/26/26789.png" id="albumImg"/>
                                                {{ $album->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                          </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
