@extends('layouts.main')
@section('title',$tvshows['name'])
@section('content')


{{-- start  details --}}

<div class="container mt-10">
    <div class="row">
	    <div class=" col-lg-4 col-sm-12 ">
	      <img src="{{$tvshows['poster_path']}}" class="w-64 lg:w-96">
	    </div>

	    <div class="col-lg-8 col-sm-12 mt-3">
	      <h2>{{$tvshows['name']}}</h2>
		      <div class=" text-gray-400 ">
		      	@if ($tvshows['vote_average']>1)
		      	<span >star</span>
		      	<span class="ml-1">{{$tvshows['vote_average']}}</span>
		      	<span class="mx-2">|</span>
		      	@endif
				<span>{{$tvshows['first_air_date']}}</span>
				@if ($tvshows['genres']>1)
			      	<span class="mx-2">|</span>
					<span>
						{{-- @foreach ($['genres'] as $genre) --}}
							{{$tvshows['genres']}}
						{{-- @endforeach --}}
					</span>
				@endif
		   </div>
		   <div class="mt-10 mb-10" >
		    	<p class="">{{$tvshows['overview']}}</p>
		   </div>

	   {{-- ############################seasons#################################### --}}
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
	   {{-- ############################ end seasons#################################### --}}


		 {{--######################## crew############################# --}}
		 @if (count($tvshows['crew'])>1)
		   	<h4 class="hed4" >Featured Crew</h4>
			  <div class="row">
			  	@foreach ($tvshows['crew'] as $crew)
			  		{{-- @if ($loop->index<3) --}}

					    <div class="col-4 mb-20">
 							
				   			<div class="text-medium mt-6" >
				   				{{$crew['name']}}
				   		
				  		 	</div>
				   			<span class="text-sm text-gray-400" >{{$crew['job']}}</span>

					    </div>
			  		{{-- @else --}}
			  			{{-- @break --}}
			  		{{-- @endif --}}
			  	@endforeach
			  </div>
		@endif
		<div x-data="{isOpen:false}">
			@if (count($tvshows['videos']['results'])>0)
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


@if (count($tvshows['cast'])>1)
	<hr class="mb-20  mt-24 bg-gray-500">

	{{-- start cast details --}}
	<h2 class="heder text-center">CAST</h2>

	<div class="container  ">
	  <div class="row ">
		@foreach ($tvshows['cast'] as $cast)
			{{-- @if ($loop->index<4) --}}
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
	{{-- 		@else
				@break
			@endif
	 --}}
		@endforeach


		</div>
	</div>

@endif

{{-- end cast details --}}
@if (count($tvshows['images'])>0)
	<hr class="my-20   bg-gray-500">

	{{-- start images section --}}
	<h2 class="heder text-center uppercase">images</h2>

	<div class="main_modal container" x-data="{isOpen:false,image:''}">
	  <div class="row ">
	  		@foreach ($tvshows['images'] as $image)
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
	{{--   			@else
	  				@break
	  			@endif --}}
	  		@endforeach

	   </div>

	   {{-- try --}}
		<div style="background-color: rgba(0, 0, 0, 0.5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
	        <div class=" container mx-auto lg:px-32 rounded-lg overflow-y-auto">
	            <div class="bg-gray-900 rounded">
	                <div class="flex justify-end pr-4 pt-2">
	                    <button 
	                    @click="isOpen =false" 
	                    @keydown.escape.window="isOpen = false"
	                     class="text-3xl leading-none hover:text-gray-300">&times;
	                    </button>
	                </div>
	                <div class="modal-body px-8 py-8">
	                    <img :src="image" alt="poster" :src="image">
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

@endif
{{-- try --}}
<hr class="my-10">

{{-- end --}}
@stop