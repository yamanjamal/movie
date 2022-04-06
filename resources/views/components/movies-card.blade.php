<div class=" col-lg-2 col-md-4  col-sm-6 col-xs-12 py-2 mb-20">
	<a href="{{ route('show',$movie['id']) }}">
      <img src="{{$movie['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-500 pb-2 ">
    </a>
  <a href="{{ route('show',$movie['id']) }}" class="name"  >{{$movie['title']}} </a>
  <div class=" text-gray-400 ">
  	<span >Rating:</span>
  	<span class="ml-1">{{$movie['vote_average']}}</span>
  	<span class="mx-2">|</span>
		<span>{{$movie['release_date']}}</span>
  	
  </div>
  <div class="text-gray-400 ">
  	<span class="text-sm ">
{{--  @foreach ($movie['genre_ids'] as $genre)
  		  {{$genres->get($genre)}}
  		  @if (! $loop->last),@endif
  		@endforeach --}}
      {{$movie['genres']}}
    	</span>
   </div>
 </div>