@extends('layouts.main')
@section('title','HAPPY')
@section('content')

  {{-- start Iactors details --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 " id="in-theater"> Actors</h2>
	  <div class="row ">
  		@foreach ($papuler_actors as $actor)
			<div class=" col-lg-3 col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
				@if (isset($actor['profile_path']))
					<a href="{{ route('actor.show',$actor['id']) }}">
				      <img src="{{'https://image.tmdb.org/t/p/w500'.$actor['profile_path']}}" 
				      class="hover:opacity-75 transition ease-in-out duration-500 pb-2 ">
				    </a>
				@else
					<a href="{{ route('actor.show',$actor['id']) }}">
				      <img src="https://via.placeholder.com/300x450 " 
				      class="hover:opacity-75 transition ease-in-out duration-500 pb-2 ">
				    </a>
				@endif
				<a href="{{ route('actor.show',$actor['id']) }}" class="name"  >{{$actor['name']}}</a>
				<div class=" text-gray-400 ">
					<span >popularity:</span>
					<span class="ml-1">{{$actor['popularity']}}</span>
					<span class="mx-2">|</span>
				<span>{{$actor['known_for_department']}}</span>
				</div>
			 </div>			  	
  		@endforeach
	  </div>
</div>
 {{-- end actors details --}}
 <x-pagination :page="$page" :rout="$rout" />

<hr class="my-12">

@stop