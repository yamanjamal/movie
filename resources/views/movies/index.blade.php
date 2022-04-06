@extends('layouts.main')
@section('title','HAPPY')
@section('content')



{{-- nav --}}
{{-- <hr class=" index_hr mt-32"> --}}

{{-- 
<ul class="index_nav  nav justify-center mt-3  ">
        <li class="nav-item dropdown  " >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            genres
          </a>
          <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
           	@foreach ($genresfornav as $genres)
			  <li class="nav-item   text-center border-b border-gray-500">
			    <a class="nav-link active" aria-current="page" href="#">{{$genres['name']}}</a>
			  </li>

			@endforeach
          </ul>
        </li>
        <li class="nav-item dropdown  ml-8">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            year
          </a>
          <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
          	@for ($i = 2020; $i >=1900 ; $i-=10)
   	      	 <li class="nav-item   text-center border-b border-gray-500">
   	      	 	<a class="nav-link active text-center " href="#">{{$i}}</a>
   	      	 </li>
          	@endfor
          </ul>
        </li>
        <li class="nav-item dropdown  ml-8">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Raing
          </a>
          <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
   	       @for ($i =10 ; $i >=1 ; $i--)   	     
	   	       <li class="nav-item  text-center  border-b border-gray-500">
	   	          <a class="dropdown-item" href="#">{{$i}}</a>
	   	       </li>
   	       @endfor
		    
          </ul>
        </li>
        <li class="nav-item dropdown  ml-8">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Age
          </a>
          <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
   	       <li><a class="dropdown-item" href="#">Action</a></li>
		    <li><a class="dropdown-item" href="#">Another</a></li>
		    <li><a class="dropdown-item" href="#">Something</a></li>
          </ul>
        </li>
</ul>
<hr class="mt-4">
 --}}
{{-- end nav --}}

  {{-- start In Theatre movies --}}
      <x-carusel :nowplaying="$nowplaying"  />
<div class="container  mx-auto px-4 pt-8 ">
    <h2 class="heder text-center mb-10 " id="in-theater"> In Theatre</h2>
	  <div class="row ">
	  		@foreach ($nowplaying as $movie)
			  	<x-movies-card :movie="$movie"  />
	  		@endforeach
	  </div>
</div>

 {{-- end In Theatre movies --}}
<hr class="my-8">
  {{-- start  toprated --}}
<div class="container  mx-auto px-4 pt-8 ">
    <h2 class="heder text-center mb-10 " id="toprated"> top rated movies</h2>
	  <div class="row ">
	  		@foreach ($toprated as $movie)
			  	<x-movies-card :movie="$movie"  />
	  		@endforeach
	  </div>
</div>
 {{-- end toprated movies --}}
<hr class="my-8">
 {{-- start papular --}}
<div class="container mx-auto px-4 pt-8 ">
    <h2 class="heder text-center mb-10 " id="papuler"> popular movies</h2>
	  <div class="row ">
	  	@foreach ($papuler_movies as $movie)
		  	<x-movies-card :movie="$movie"  />
	  	@endforeach
	  </div>
</div>
 {{-- end papular movies --}}
<hr class="my-8">
@stop