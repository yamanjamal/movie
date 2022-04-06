@extends('layouts.main')
@section('title',$actor['name'])
@section('content')

{{-- start movie details --}}
<div class="container mt-10">
    <div class="row">
	    <div class=" col-lg-4 col-sm-12  mt-3">
	    	@if (isset($actor['profile_path']))
	      		<img src="{{'https://image.tmdb.org/t/p/w500'.$actor['profile_path']}}" 
	      		class="w-64 lg:w-80">
	    		@else
	    		<img src="https://via.placeholder.com/350x473 ">
	    	@endif
	    	@if (isset($actor['imdb_id']))
	      		<a href="https://www.imdb.com/name/{{$actor['imdb_id']}}/?ref_=nv_sr_srsg_0" target="_blank">
		      		<img src="{{ asset('/img/imdb.png') }}" class="my-4" height="40px" width="40px">
		        </a>
	    	@endif
	    </div>
	    <div class="col-lg-8 col-sm-12 mt-3">
	      	<h2>{{$actor['name']}}</h2>
		     	<div class=" text-gray-400 ">
		     		@if (isset($actor['popularity']))
				      	<span >popularity :</span>
				      	<span class="ml-1">{{$actor['popularity']}}</span>
		     		@endif
		     		@if (isset($actor['known_for_department']))
				      	<span class="mx-2">|</span>
				      	<span class="ml-1">{{$actor['known_for_department']}}</span>
		     		@endif
		     		@if (isset($actor['birthday']))
				      	<span class="mx-2">|</span>
						<span>{{\carbon\carbon::parse($actor['birthday'])->format('M D ,Y')}}</span>
		     		@endif
		     		@if (isset($actor['place_of_birth']))
			      		<span class="mx-2">|</span>
			      		<span class="ml-1">{{$actor['place_of_birth']}}</span>
		     		@endif
			    <div class="mt-10 mb-10" >
			    	<p class="text-white">{{$actor['biography']}}</p>
			    </div>
            </div>
		</div>
	</div>
</div>
{{-- end show movies detailes --}}
{{-- start cast details --}}
@if (count($credits['cast'])>0)
	<hr class="mb-20  mt-24 bg-gray-500">
	<h2 class="heder text-center">known for</h2>
	<div class="container  ">
	    <div class="row ">
			@foreach ($credits['cast'] as $cast)
				@if ($loop->index<6)
			    <div class="col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 ">
			    	@if ($cast['poster_path'])
				  		<a href="{{ route('show', $cast['id']) }}">
					      <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['poster_path']}}" 
					      class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " 
					      height="100px" width="250px">
					    </a>
				    @else
				    	<a href="{{ route('show', $cast['id']) }}">
					    	<img src="https://via.placeholder.com/250x373 " class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
						</a>
			    	@endif
			    	@if (isset($cast['title']))
				        <a href="{{ route('show', $cast['id']) }}" 
				         class="text-center uppercase" > {{$cast['title']}}</a>
			    		{{-- expr --}}
			    		@else
				    		<a href="{{ route('show', $cast['id']) }}" 
					         class="text-center uppercase" > {{$cast['name']}}</a>
			    	@endif
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
	@if (count($actor['credits']['cast'])>0)
		<div class="container">
			<div class="row">
				<a  href="{{ route('actor.known',$actor['id']) }}" class="btn btn-success mt-5">SEE MORE</a>
				
			</div>
		</div>
	@endif
@endif
{{-- end cast details --}}
@if (count($actor['images']['profiles'])>0)
	<hr class="my-20   bg-gray-500">
	{{-- start images section --}}
	<h2 class="heder text-center uppercase">images</h2>
	<div class="main_modal container" x-data="{isOpen:false,image:''}">
	  <div class="row ">
		@foreach ($actor['images']['profiles'] as $image)
			@if ($loop->index<8)
			    <div class=" col-md-3  col-sm-6 col-xs-12 py-3 mb-20">
			    	{{-- <a href=""> --}}
				      <img 
				      src="{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}" 
				      class="hover:opacity-75 transition ease-in-out duration-500  pb-2  mx-0" >
			    	{{-- </a> --}}
			    </div>
			@else
				@break
			@endif
		@endforeach
	   </div>
	</div>
@endif
{{-- try --}}

{{-- end --}}
@stop