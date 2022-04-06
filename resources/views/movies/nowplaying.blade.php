@extends('layouts.main')
@section('title','toprated')
@section('content')


  {{-- start In Theatre movies --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 " id="in-theater"> In Theatre</h2>
	  <div class="row ">
	  		@foreach ($nowplaying as $movie)
			  	<x-movies-card :movie="$movie"  />
	  		@endforeach
	  </div>
</div>
 {{-- end In Theatre movies --}}

<x-pagination :page="$page" :rout="$rout" />
<hr class="my-16">

@stop