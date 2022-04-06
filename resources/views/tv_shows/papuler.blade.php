@extends('layouts.main')
@section('title','toprated')
@section('content')


 {{-- start papuler movies --}}
<div class="  mx-auto px-4 pt-8 ">
    <h2 class="heder text-center mb-10 "> papular tv shows</h2>
    <div class="container ">
	  <div class="row ">
		@foreach ($papuler as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
	  	@endforeach
	  </div>
	</div>
</div>

 {{-- end papuler movies --}}
 <x-pagination :page="$page" :rout="$rout" />
<hr class="my-16">
@stop