@extends('layouts.main')
@section('title',$movie['title'])
@section('content')

{{-- start movie details --}}
<div class="show">
	<div class="container mt-10">
	    <div class="row">
		    <div class=" col-lg-4 col-sm-12 ">
		    	{{-- @if (!is_null($movie['poster_path'])) --}}
			      	<img src="{{$movie['poster_path']}}" class="w-64 lg:w-96">
			     {{--  @else
			      	<img src="https://via.placeholder.com/250x376" >
		    	@endif --}}
		    </div>
		    <div class="col-lg-8 col-sm-12 mt-3">
		      <h2>{{$movie['title']}}</h2>
  		      <div class=" text-gray-400 "> 
  		      	@if ($movie['vote_count']>5	 && $movie['vote_average']<10 && $movie['vote_average']>0)
			      	<span >star</span>
			      	<span class="ml-1">{{$movie['vote_average']}}</span>
			      	<span class="mx-2">|</span>

  		      	@endif
					{{-- <span>{{\carbon\carbon::parse($movie['release_date'])->format('M D ,Y')}}</span> --}}
					<span>{{$movie['release_date']}}</span>
				{{-- 	@foreach ($movie['genres'] as $genre)
							{{$genre['name']}}
							@if (! $loop->last),@endif
						@endforeach --}}
					
					@if ($movie['genres']>1)
				      	<span class="mx-2">|</span>
						<span>
							{{$movie['genres']}}
						</span>
					@endif

			   </div>
			   <div class="mt-10 mb-10" >
			    	<p class="">{{$movie['overview']}}</p>
			   </div>

			 {{--######################## crew############################# --}}
			 @if (count($movie['crew'])>1)
			   	<h4 class="hed4" >Featured Crew</h4>
				  <div class="row">
				  	@foreach ($movie['crew'] as $crew)
						    <div class="col-4 mb-20">
					   			<div class="text-medium mt-6" >
					   				{{$crew['name']}}
					  		 	</div>
					   			<span class="text-sm text-gray-400" >{{$crew['job']}}</span>
						    </div>
				  	@endforeach
				  </div>
			 @endif
				@if (count($movie['videos']['results'])>0)
					<div x-data="{isOpen:false}">
		 			  		<BUTTON
				  				@click="isOpen = true"

				  	 			class=" watch_btn btn btn-danger btn-lg ml-5  my-8 uppercase" 
				  			>
					  		<i class="fa fa-play-circle mr-2"
							   		>
							   		</i> play trailer</BUTTON>

							{{-- modal work --}} 
							{{--<button class="watch_btn btn btn-danger btn-lg ml-5  my-8 uppercase 
								js-modal-btn" 
								data-video-id="{{ $movie['videos']['results'][0]['key'] }}">
								<i class="fa fa-play-circle mr-2">
							   		</i> play trailer</button> --}}

						

					   	<a href="" class="  btn btn-success btn-lg  my-8 ml-6 uppercase " ><i class="fa fa-play-circle mr-2"></i> download</a>
						{{-- work here --}}
		                     <div  class=" main_modal"{{-- x-if="isOpen" --}} >
		                        <div
		                     	   x-show.transition.opacity="isOpen"
		                        	{{-- @click="isOpen = false" --}}
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
		                                            <iframe  class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
						</div>
				@else
	                <a href="" class="  btn btn-success btn-lg  my-8 ml-6 uppercase " ><i class="fa fa-play-circle mr-2"></i> download</a>
				@endif
				{{-- end work here --}}
		</div>
  	</div>
</div>



{{-- end show movies detailes --}}

{{-- start cast details --}}
@if (count($movie['cast'])>1)
<hr class="mb-20  mt-24 bg-gray-500">
	<h2 class="heder text-center">CAST</h2>

	<div class="container">
	  <div class="row  ">
		@foreach ($movie['cast'] as $cast)
			{{-- @if ($loop->index<4) --}}
		    <div class="col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 ">
		    	@if (isset($cast['profile_path']))
			  		<a href="{{ route('actor.show',$cast['id']) }}">
				      <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" 
				      class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " 
				      height="100px" width="250px">
				    </a>
			    @else
			    	<img src="https://via.placeholder.com/250x376" class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
		    	@endif
			      <a href="{{ route('actor.show',$cast['id']) }}" 
			      class="text-center uppercase" > {{$cast['name']}}</a>
			      <div class=" text-gray-400 ">
			      	<span >{{$cast['character']}}</span>
			      </div>
		      </div>
		@endforeach
	  </div>
	</div>
@endif
{{-- end cast details --}}
	<hr class="my-20   bg-gray-500">
@if (count($movie['images'])>0)

	{{-- start images section --}}
	<h2 class="heder text-center uppercase">images</h2>

	<div class="main_modal container" x-data="{isOpen:false,image:''}">
	  <div class="row ">
	  		@foreach ($movie['images'] as $image)
	  			{{-- @if ($loop->index<9) --}}
			    <div class="  col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
			  		<a href="">
				      <img 
				      @click.prevent="
				      isOpen=true
				      image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
				      "
				      src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" class="hover:opacity-75 transition ease-in-out duration-500  pb-2 ">
				    </a>
			    </div>
	  			{{-- @else --}}
	  				{{-- @break --}}
	  			{{-- @endif --}}
	  		@endforeach

	   </div>

	   {{-- try --}}
	   <div class="img_modal">
			<div style="background-color: rgba(0, 0, 0, 0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" 
			x-show="isOpen"  @click="isOpen = false" >
		        <div 
		         class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
		            <div class="bg-gray-900 rounded">
		                <div class="flex justify-end pr-4 pt-2">
		                    <button 
		                    @click="isOpen =false" 
		                    @keydown.escape.window="isOpen = false"
		                     class="text-3xl leading-none hover:text-gray-300">&times;
		                    </button>
		                </div>
		                <div class="modal-body px-8 py-8" @click="isOpen = true" >
		                    <img :src="image" alt="poster" :src="image" >
		                </div>
		            </div>
		        </div>
		    </div>
	   	
	   </div>
	</div>

@endif
{{-- try --}}


{{-- end --}}
@stop