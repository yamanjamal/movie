<div class=" col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
	<a href="{{ route('tv.show',$tvshow['id']) }}">
      <img src="{{$tvshow['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 pb-2 ">
    </a>
  <a href="{{ route('tv.show',$tvshow['id']) }}" class="name"  >{{$tvshow['name']}}</a>
  <div class=" text-gray-400 ">
  	<span >star</span>
  	<span class="ml-1">{{$tvshow['vote_average']}}</span>
    	<span class="mx-2">|</span>
  		<span>{{$tvshow['first_air_date']}}</span>
  	
  </div>
  <div class="text-gray-400 ">
  	<span class="text-sm">
{{--   		@foreach ($tvshow['genre_ids'] as $genre)
  		{{$genres->get($genre)}}
  		@if (! $loop->last),@endif
  		@endforeach --}}
      {{$tvshow['genres']}}
    	</span>
   </div>
 </div>