@extends('layouts.main')
@section('title',$actor['name'])
@section('content')


@if (count($actor['credits']['cast'])>0)
    <h2 class="heder text-center my-10 ">{{$actor['name']}} </h2>

	 <div class="container ">
	    <div class="row ">
			@foreach ($actor['credits']['cast'] as $cast)
			    <div class="col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2  mb-12">
			    	@if ($cast['poster_path'])
				  		<a href="{{ route('show', $cast['id']) }}">
					      <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['poster_path']}}" 
					      class="hover:opacity-75 transition ease-in-out duration-500 pb-2 " 
					      height="100px" width="250px">
					    </a>
				    @else
				    	<a href="{{ route('show', $cast['id']) }}">
					    	<img src="https://via.placeholder.com/250x373 " class="hover:opacity-75 transition ease-in-out duration-500 pb-2">
						</a>
			    	@endif
			        <a href="{{ route('show', $cast['id']) }}" 
			         class="text-center uppercase" > {{$cast['title']}}</a>
				    <div class=" text-gray-400 ">
				    	<span >star</span>
				  	    <span class="ml-1">{{$cast['vote_average']}}</span>
				  	    <span class="mx-2">|</span>
				  	    @if (isset($cast['release_date']))
							<span>({{ \carbon\carbon::parse($cast['release_date'])->format('Y')}})</span>
				  	    	{{-- expr --}}
				  	    @endif
				    </div>
			        <div class=" text-gray-400 ">
			        	<span > character: {{$cast['character']}}</span>
			        </div>
			    </div>
			@endforeach
	    </div>
	</div>

	<hr class="my-16">
{{-- <x-pagination :page="$page" :rout="$rout" /> --}}
@endif

@stop