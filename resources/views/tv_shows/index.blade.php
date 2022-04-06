@extends('layouts.main')
@section('title','HAPPY')
@section('content')
 {{-- start papuler movies --}}
<div class="  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 "> papular tv shows</h2>
    <div class="container ">
	  <div class="row ">
		@foreach ($papuler_tv as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
	  	@endforeach
	  </div>
	</div>
</div>
 {{-- end papuler movies --}}
<hr class="my-8">
  {{-- start top rated movies --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 "> top rated tv shows</h2>
    <div class="container  ">
	  <div class="row ">
  		@foreach ($topratedgtv as $tvshow)
		  	<x-tv-card :tvshow="$tvshow"  />
  		@endforeach
	  </div>
	</div>
</div>
  {{-- end top rated movies --}}
<hr class="my-8">
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

@stop