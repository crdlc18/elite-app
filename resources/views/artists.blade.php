@extends('layout')
@section('title', 'ElitePlayer | Artists')
@section('content')

<div class="container mt-3 artist-container">
    @if(session('success'))
      <div id="successMessage" class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
    @endif

    <!-- Search bar and Add button -->
    <div class="row mb-3 artist-topcon">
        <div class="col-md-6">
            <input type="text" class="form-control" id="artistSearchBar" name="artistSearchBar" placeholder="Search artist...">
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary addBtn" id="addArtistBtn">Add</button>
        </div>
    </div>

    <div class="row">
        @foreach($artists as $index => $artist)
        <div class="col-md-4 mb-3">
            <input type="checkbox" id="collapse{{$index}}" class="collapse-toggle">
            <div class="card artist-card">
                <label for="collapse{{$index}}" class="card-header">
                    <h5>{{ $artist->name }}<span class="right">{{ number_format($artist->totsales, 0,'.',',')}}</span></h5>
                    <p>Artist<span class="right-small">Total Sales</span></p>
                </label>
                <div class="card-body">
                    <p><strong>Albums</strong></p>
                    @foreach($artist->albums as $album)
                    <p>{{$album->name}}</p>
                    @endforeach
                    <!-- Buttons for update and delete -->
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary artist-upBtn">Update</button>
                        </div>
                        
                        <form action="{{ route('artist.destroy', $artist->code) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<!-- Modal for adding a new artist -->
<div class="modal fade custom-modal" id="addArtistModal" tabindex="-1" aria-labelledby="addArtistModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addArtistModalLabel">Add New Artist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('artist.store')}}" id ="addForm" name="addForm" method="post">
        @csrf
        @method('post')
          <div class="mb-3">
            <label for="newArtist" class="form-label">Artist Name:</label>
            <input type="text" class="form-control" id="newArtist" name="newArtist" placeholder="Enter artist name" required>
          </div>
        
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="saveArtistBtn">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




<script>
$(document).ready(function() {
  
  $('#addArtistBtn').click(function() {
    $('#addArtistModal').modal('show');
  });

  setTimeout(function() {
    $("#successMessage").fadeOut("slow");
  }, 2000);
   
});
</script>

@endsection
