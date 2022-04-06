@extends('layouts.main')
@section('title','toprated')
@section('content')


 {{-- start papular --}}
<div class=" container mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 " id="papuler"> popular movies</h2>
	  <div class="row ">
	  	@foreach ($papuler as $movie)
		  	<x-movies-card :movie="$movie"  />
	  	@endforeach
	  </div>
</div>
 {{-- end papular movies --}}
  <x-pagination :page="$page" :rout="$rout" />
  <hr class="my-16">

@stop