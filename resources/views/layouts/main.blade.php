<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- <link rel="shurtcut icon" type="image/x-icon" href="{{ asset('img/pop.webp') }}"> --}}
        <link rel="shurtcut icon" type="image/x-icon" href="{{ asset('img/mo.png') }}">
        <title> @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <!-- bootstrap5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- bootstrap4 -->
        {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
               
        <link href="{{ asset('css/se.css') }}" rel="stylesheet">
        {{-- modal --}}
{{--         <link href="{{ asset('css/modal-video.min.css') }}" rel="stylesheet">
 --}}        {{-- end test --}}

        
        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
         <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>




         @livewireStyles
       

    </head>
    <body class="{{-- text-white bg-gray-900  --}} " >
{{--         <nav class=" navbar navbar-expand-lg  py-3">
          <div class="container">
            <a href="{{ route('movie') }}"  >
                <img src="{{ asset('img/pop.webp') }}" height="40" width="40"> 
            </a>

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
              <div class="flex items-center">
                  <div class="realtive">
                      <input type="text" name="search" autofocus="on" class="bg-gray-700 rounded-full mt-0 mb-2 w-64 py-2 pl-4 mt-2 pt-1 outline-none shadow-outline "   placeholder="search">
                  </div> 

              </div>
            </div>
          </div>
        </nav> --}}
            @include('layouts.navbar')
            <hr>
            
        @yield('content')
        <!-- bootstrap5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

                <!-- bootstrap4 -->
  {{--       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}

        {{-- modal --}}
        {{-- <script src="{{ asset('js/jquery-modal-video.min.js') }}" type="text/javascript"></script> --}}
        {{-- <script src="/js/jquery-modal-video.min.js" type="text/javascript"></script> --}}
        {{-- <script > --}}
            
            {{-- $(".js-modal-btn").modalVideo(); --}}
        {{-- </script> --}}
        {{-- end  modal --}}


        @livewireScripts
    </body>
</html>
