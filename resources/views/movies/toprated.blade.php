@extends('layouts.main')
@section('title','toprated')
@section('content')

  {{-- start  toprated --}}
<div class="container  mx-auto px-4 pt-16 ">
    <h2 class="heder text-center mb-10 " id="toprated"> top rated movies</h2>
	  <div class="row ">
	  		@foreach ($toprated as $movie)
			  	<x-movies-card :movie="$movie"  />
	  		@endforeach
	  </div>
</div>
 {{-- end toprated movies --}}
 
{{-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item " tabindex="-1">
      <a class="page-link" href="{{ route('movie_toprated',$page-1) }}" aria-disabled="true">Previous</a>
    </li>
    @for ($i = 1; $i <=20 ; $i++) 
    <li class="page-item"><a class="page-link"  href="{{ route('movie_toprated',$i) }}">{{$i}}</a></li>
    @endfor
    <li class="page-item">
      <a class="page-link" href="{{ route('movie_toprated',$page+1) }}" >Next</a>
    </li>
  </ul>
</nav>
 --}}
    <x-pagination :page="$page" :rout="$rout" />


<hr class="my-16">
@stop