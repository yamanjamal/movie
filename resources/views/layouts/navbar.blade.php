
<nav class="main_navbar navbar navbar-expand-lg ">
  <div class="container pt-2 pb-0">
     <a  a href="{{ route('movie') }}"  class="navbar-brand brand text-red-600  font-bold uppercase hover:text-red-500 ">happy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown  ml-12 text-center">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-film text-sm"></i>
            
            movies
          </a>      
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
     {{--        <li><a class="dropdown-item" href="{{ route('movie') }}">
                <i class="fa fa-tasks text-sm mr-2"></i>  All</a></li> --}}
            <li><a class="dropdown-item" href=" {{ route('movie_toprated',1) }}">
                <i class="fa fa-hat-cowboy-side text-sm"></i> top Rated</a></li>
            <li><a class="dropdown-item" href="{{ route('movie_papuler',1) }}">
             <i class="fa fa-crown text-sm"></i>  popular</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('movie_nowplaying',1) }}"><i class="fa fa-splotch text-sm"></i> in theater</a></li>
          </ul>
        </li> 
        <li class="nav-item dropdown  ml-2 text-center">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-tv text-sm"></i>
            tv shows
          </a>      
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('tv') }}">
                <i class="fa fa-tasks text-sm mr-2"></i>  All</a></li>
            <li><a class="dropdown-item" href=" {{ route('tv_toprated',1) }}">
                <i class="fa fa-hat-cowboy-side text-sm"></i> top Rated</a></li>
            <li><a class="dropdown-item" href="{{ route('tv_papuler',1) }}">
             <i class="fa fa-crown text-sm"></i>  popular</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('tv_nowplaying',1) }}"><i class="fa fa-splotch text-sm"></i> in theater</a></li>
          </ul>
        </li> 
         <li class="nav-item ml-2 text-center">
            <a href="{{ route('actor',1) }}" class="ml-2 nav-link"><i class="fa fa-users text-sm" ></i> actors </a>
        </li>
      </ul>
        <livewire:search-dropdown>
    </div>
  </div>
</nav>