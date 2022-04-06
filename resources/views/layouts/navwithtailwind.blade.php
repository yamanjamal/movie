<div class=" border-b border-gray-700 text-lg pb-2 ">
    <nav calss="main_navbar navbar navbar-expand-lg  text-sans">
        <div class="container mx-auto flex  items-center justify-between px-4 pt-4 ">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('movie') }}"  >
                        <img src="{{ asset('img/pop.webp') }}" height="40" width="40">
                    </a>
                </li>
                <li>
                   {{--  <a class="navbar-brand" href="#">
                      <img src="{{ asset('img/pop.webp') }}" alt="" width="30" height="24">
                    </a> --}}
                    <a href="{{ route('movie') }}"  class="brand text-red-600  font-bold uppercase hover:text-red-500 ">
                        happy
                    </a>

                </li>

{{--                        <li>
                    <a href="{{ route('movie') }}" class="ml-16  ">
                        movies 
                    </a>
                </li> --}}
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
                <li>
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
                    
                 {{-- <li>
                    <a href="{{ route('tv') }}" class="ml-8 "><i class="fa fa-tv text-sm"></i> tv shows </a>
                </li> --}}
                 <li>
                    <a href="{{ route('actor',1) }}" class="ml-2 "><i class="fa fa-users text-sm" ></i> actors </a>
                </li>

            </ul>
            <div class="flex flex-col md:flex-row items-center ">
            {{--<div class="realtive">
                    <input type="text" name="search" autofocus="on" class="bg-gray-700 rounded-full mt-0 mb-2 w-64 pb-2 pl-4  pt-1 outline-none shadow-outline "   placeholder="search">
                </div> --}}
           
                <livewire:search-dropdown>

            </div>
        </div>
     </nav>
</div>