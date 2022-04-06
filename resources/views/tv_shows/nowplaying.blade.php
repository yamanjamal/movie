@extends('layouts.main')
@section('title','toprated')
@section('content')

  {{-- start now playing movies --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 "> nowplaying tv shows</h2>
    <div class="container  ">
	  <div class="row ">
  		@foreach ($nowplaying as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
  		@endforeach
	  </div>
	</div>
</div>
  {{-- start now playing movies --}}

  <x-pagination :page="$page" :rout="$rout" />
<hr class="my-16">
@stop