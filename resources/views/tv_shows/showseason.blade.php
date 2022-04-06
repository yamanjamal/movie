@extends('layouts.main')
@section('title',$tvshows['name'])
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
	      <h2>{{$tvshows['name']}}  : {{$tvseasons['name']}}</h2>
		      <div class=" text-gray-400 ">
		      {{-- 	@if ($tvseasons['vote_average']>1)
		      	<span >star</span>
		      	<span class="ml-1">{{$tvseasons['vote_average']}}</span>
		      	<span class="mx-2">|</span>
		      	@endif --}}
				<span>{{\carbon\carbon::parse($tvseasons['air_date'])->format('M D ,Y') }}</span>
				{{-- @if ($tvseasons['genres']>1) --}}
			      	{{-- <span class="mx-2">|</span> --}}
					{{-- <span> --}}
						{{-- @foreach ($['genres'] as $genre) --}}
							{{-- {{$tvseasons['genres']}} --}}
						{{-- @endforeach --}}
					{{-- </span> --}}
				{{-- @endif --}}
		   		</div>
			    <div class="mt-10 mb-10" >
			    	<p class="">{{$tvseasons['overview']}}</p>
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
						   	      	 		route('tv.show.episode',['id'=>$tvshows['id'],'season'=>$tvseasons['season_number'],'episode'=>$i]) }}">{{$i}}
						   	      	 	</a>
						   	      	 </li>
						          	@endfor
						        </ul>
					  		</div>
		   				</div>
			   {{-- ############################ end episodes#################################### --}}
			   		</div>
			   	</div>
   				<div x-data="{isOpen:false}">
					@if (count($tvseasons['videos']['results'])>0)
		 			  	<a
				  	 		class=" watch_btn btn btn-danger btn-lg ml-5  my-8 uppercase" 
				  			@click="isOpen = true"
				  		>
				  		<i class="fa fa-play-circle mr-2"
						   		>
						   		</i> play trailer</a>

						{{-- modal work --}} 
						{{-- <button class="watch_btn btn btn-danger btn-lg ml-5  my-8 uppercase  --}}
							{{-- js-modal-btn" 
							data-video-id="{{ $['videos']['results'][0]['key'] }}">
							<i class="fa fa-play-circle mr-2">
						   		</i> play trailer</button>  --}}

						

					   	<a href="" class="  btn btn-success btn-lg  my-8 ml-6 uppercase " ><i class="fa fa-play-circle mr-2"></i> download</a>
						{{-- work here --}}
	                     <div  class="main_modal"{{-- x-if="isOpen" --}} >
	                        <div
	                     	   x-show.transition.opacity="isOpen"
	                        	@click="isOpen = false"
	                            style="background-color: rgba(0, 0, 0, .5);"
	                            class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
	                            {{-- x-show.transition.opacity="isOpen" --}}
	                        >
	                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
	                                <div class="bg-gray-900 rounded">
	                                    <div class="flex justify-end pr-4 pt-2">
	                                        <button
	                                            @click="isOpen = false"
	                                            @keydown.escape.window="isOpen = false"
	                                            class="text-3xl leading-none hover:text-gray-300">&times;
	                                        </button>
	                                    </div>
	                                    <div class="modal-body px-8 py-8">
	                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
	                                        	{{-- @if (isOpen=true) --}}
	                                        		{{-- expr --}}
	                                            <iframe  class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvshows['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	                                        	{{-- @endif --}}
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                @else
	                    <a href="" class="  btn btn-success btn-lg  my-8 ml-6 uppercase " ><i class="fa fa-play-circle mr-2"></i> download</a>
	                @endif
				</div>
			{{-- end work here --}}
  		</div>
	</div>
</div>

{{-- end show s detailes --}}


@if (count($tvseasons['credits']['cast'])>1)
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
	<hr class="mb-20  mt-24 bg-gray-500">
{{-- start show epidsods --}}
<h2 class="heder text-center mb-10 ">  Episodes </h2>

<div class="container  ">
  <div class="row ">
	@foreach ($tvseasons['episodes'] as $episode)
		{{-- @if ($loop->index<6) --}}
	    <div class=" col-lg-3 col-md-4  col-sm-6 col-xs-12 py-2 ">
	    	@if ($episode['still_path'])
		  		<a href="{{ route('tv.show.episode',['id'=>$tvshows['id'],'season'=>$episode['season_number'],'episode'=>$episode['episode_number']]) }}">
			      <img src="{{'https://image.tmdb.org/t/p/w500/'.$episode['still_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " height="100px" width="250px">
			    </a>
		    @else
			    <a href="{{ route('tv.show.episode',['id'=>$tvshows['id'],'season'=>$episode['season_number'],'episode'=>$episode['episode_number']]) }}">
			    	<img src="https://via.placeholder.com/250x376 " 
			    	class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
			    </a>
	    	@endif
		      <a href="{{ route('tv.show.episode',['id'=>$tvshows['id'],'season'=>$episode['season_number'],'episode'=>$episode['episode_number']]) }}" 
		      class="text-center uppercase" >episode : {{$episode['episode_number']}} </a>
		      <div class=" text-gray-400 ">
		      	<span >{{($episode['name'])}}</span>
		      </div>
	      </div>
		{{-- @else --}}
			{{-- @break --}}
		{{-- @endif --}}
	@endforeach
  </div>
</div>
{{-- end  show epidsods --}}

<hr class="my-16">
@stop