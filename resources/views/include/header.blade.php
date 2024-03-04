
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="navCon container-fluid">
    <a class="navbar-brand" href="#">ElitePlayer</a>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        @auth
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('artist.index')}}">Artist</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Albums</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>@auth{{auth()->user()->name}} @endauth</span>
            </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
