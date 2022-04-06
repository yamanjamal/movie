@extends('layouts.main')
@section('title','toprated')
@section('content')


  {{-- start top rated movies --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 "> top rated tv shows</h2>
    <div class="container  ">
	  <div class="row ">
  		@foreach ($toprated as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
  		@endforeach
	  </div>
	</div>
</div>
  {{-- end top rated movies --}}
<x-pagination :page="$page" :rout="$rout" />
<hr class="my-16">

@stop