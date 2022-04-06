@extends('layouts.main')
@section('title','toprated')
@section('content')


 {{-- start papuler movies --}}
{{-- <div class="  mx-auto px-4 pt-8 ">
    <h2 class="heder text-center mb-10 ">  tv shows season</h2>
    <div class="container ">
	  <div class="row ">

	  	{{$tvseasons[]}}
		@foreach ($papuler as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
	  	@endforeach
	  </div>
	</div>
</div>
 --}}

 {{-- start show detaidels --}}
 <div class="container mt-10">
    <div class="row">
	    <div class=" col-lg-4 col-sm-12 ">
	      <img src="{{'https://image.tmdb.org/t/p/w500/'.$tvseasons['poster_path']}}" class="w-64 lg:w-96">
	    </div>

	    <div class="col-lg-8 col-sm-12 mt-3">
	       <h2>{{$tvshows['name']}}  : {{$tvseasons['name']}} : Episode : {{$episode['episode_number']}}</h2>
	      <div class=" text-gray-400 ">
		      	@if ($episode['vote_average']>1)
			      	<span >star</span>
			      	<span class="ml-1">{{$episode['vote_average']}}</span>
			      	<span class="mx-2">|</span>
		      	@endif
					<span>{{\carbon\carbon::parse($episode['air_date'])->format('M D ,Y') }}</span>
				{{-- @if ($episode['genres']>1) --}}
			      	{{-- <span class="mx-2">|</span>
					<span>
						@foreach ($['genres'] as $genre)
							{{$episode['genres']}}
						@endforeach
					</span> --}}
				{{-- @endif --}}
	   		</div>
		    <div class="mt-10 mb-10" >
		    	<p class="">{{$episode['overview']}}</p>
		    </div>
		    <div class="container mt-10">
				<div class="row">
	  		 {{-- ############################seasons#################################### --}}
					<div class=" col-lg-3 col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
					   <div class="mt-10 mb-10 tvseason" >
					        <a class="season dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            seasons
					        </a>
					        <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
					          	@for ($i = 1; $i <=$tvshows['number_of_seasons'] ; $i++)
					   	      	 <li class="nav-item   text-center border-b border-gray-500">
					   	      	 	<a class=" nav-link active text-center " 
					   	      	 	href="{{ route('tv.show.season',['id'=>$tvshows['id'],'season'=>$i]) }}">{{$i}}
					   	      	 	</a>
					   	      	 </li>
					          	@endfor
					        </ul>
				  		</div>
		   			</div>
		   {{-- ############################ end seasons#################################### --}}
	  		 {{-- ############################episodes#################################### --}}
		   			<div class=" col-lg-3 col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
					   <div class="mt-10 mb-10 tvseason" >
					        <a class="season dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					            episodes
					        </a>
					        <ul class="dropdown-menu scrollable-menu " aria-labelledby="navbarDropdown" role="menu">
					          	@for ($i = 1; $i <=count($tvseasons['episodes']) ; $i++)
					   	      	 <li class="nav-item   text-center border-b border-gray-500">
					   	      	 	<a class=" nav-link active text-center " 
					   	      	 	href="{{  
					   	      	 		route('tv.show.episode',['id'=>$tvshows['id'],'season'=>$episode['season_number'],'episode'=>$i]) }}">{{$i}}
					   	      	 	</a>
					   	      	 </li>
					          	@endfor
					        </ul>
				  		</div>
	   				</div>
		   {{-- ############################ end episodes#################################### --}}
		   		</div>
		   	</div>
		   	 <a href="" class="  btn btn-success btn-lg  my-8 ml-6 uppercase " ><i class="fa fa-play-circle mr-2"></i> download</a>
  		</div>
	</div>
</div>

{{-- end show s detailes --}}


@if (count($episode['guest_stars'])>1)
	<hr class="mb-20  mt-24 bg-gray-500">

{{-- start cast details --}}
	<h2 class="heder text-center toupper">guest stars</h2>

	<div class="container  ">
	  <div class="row ">
		@foreach ($episode['guest_stars'] as $cast)
			@if ($loop->index<6)
		    <div class=" col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 ">
		    	@if ($cast['profile_path'])
		  		<a href="{{ route('actor.show',$cast['id']) }}">
			      <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " height="100px" width="250px">
			    </a>
			    @else
			    	<img src="https://via.placeholder.com/250x376 " class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
		    	@endif
			      <a href="{{ route('actor.show',$cast['id']) }}" class="text-center uppercase" > {{$cast['name']}}</a>
			      <div class=" text-gray-400 ">
			      	<span >{{$cast['character']}}</span>
			      </div>
		      </div>
			@else
				@break
			@endif
	
		@endforeach


		</div>
	</div>
@else
	<hr class="mb-20  mt-24 bg-gray-500">
	{{-- start cast details --}}
	<h2 class="heder text-center">CAST</h2>
	<div class="container  ">
	  <div class="row ">
		@foreach ($tvseasons['credits']['cast'] as $cast)
			@if ($loop->index<6)
		    <div class=" col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 ">
		    	@if ($cast['profile_path'])
		  		<a href="{{ route('actor.show',$cast['id']) }}">
			      <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " height="100px" width="250px">
			    </a>
			    @else
			    	<img src="https://via.placeholder.com/250x376 " class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
		    	@endif
			      <a href="{{ route('actor.show',$cast['id']) }}" class="text-center uppercase" > {{$cast['name']}}</a>
			      <div class=" text-gray-400 ">
			      	<span >{{$cast['character']}}</span>
			      </div>
		      </div>
			@else
				@break
			@endif
		@endforeach
		</div>
	</div>
@endif

{{-- end cast details --}}

<hr class="my-16">
@stop