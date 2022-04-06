<div class="realtive pt-2" x-data="{ isOpen: true }" @click.away="isOpen=false">
    <input 
    wire:model.debounce.500ms="search" 
    type="text" 
    name="search" 
    autofocus="on" 
    class="bg-gray-700 rounded-full mt-0 mb-2 w-64 pb-2 pl-10  pt-1 outline-none shadow-outline "   
    placeholder="search"
    @keydown.escape.window="isOpen=false"
    @focus="isOpen=true"
    @keydown.shift.tab="isOpen=false"
    @keydown="isOpen=true"
    >
	<i  class="fa fa-search  text-sm"></i>
    
    <div wire:loading  class="spinner absolute right-0 top-0 mr-36 mt-10"></div>
	
	@if (strlen($search)>1)    
		<div  
		class="z-50 absolute  bg-gray-700 rounded text-lg w-64 " 
		x-show.transition.opacity="isOpen"
		>
			@if ($searchres->count()>0)
				@foreach ($searchres as $res)
					<a 
						@if ($res['media_type']=='movie')
							href="{{ route('show',$res['id']) }}"
						@elseif ( $res['media_type']=='person')
							href="{{ route('actor.show',$res['id']) }}" 						
						@else
							href="{{ route('tv.show',$res['id']) }}" 
						@endif
						class="border-b border-gray-600 block hover:bg-gray-600 px-3 py-3  flex items-center"
						@if ($loop->last)@keydown.tab="isOpen=false"@endif
					>

						@if ( $res['media_type']=='movie' or $res['media_type']=='tv' && isset($res['poster_path'] ))
								<img src="{{'https://image.tmdb.org/t/p/w92/'.$res['poster_path']}}" 
								class="w-8">
							@elseif ($res['media_type']=='person'  && isset($res['profile_path'])) 
								<img src="{{'https://image.tmdb.org/t/p/w92/'.$res['profile_path']}}" 
								class="w-8">
							@else
								<img src="https://via.placeholder.com/35x50">
						@endif


						@if ($res['media_type']=='movie')
							<span class="ml-2" >{{$res['title']}}</span>
							@if (isset($res['release_date']))
							<span class="ml-1" >|</span>
							<span class="ml-1 text-sm" >{{\carbon\carbon::parse($res['release_date'])->format('Y')}}</span>

							@endif
							<span class="ml-1" >|</span>
							<span class="ml-1 text-sm" >(movie)</span>

							@elseif($res['media_type']=='person')
								<span class="ml-4" >{{$res['name']}}</span>
								<span class="ml-1 text-sm" >_{{$res['known_for_department']}}</span>


							@else
								<span class="ml-2 mt-1" >{{$res['name']}}</span>
								@if (isset($res['first_air_date']))
								<span class="ml-1" >|</span>
								<span class="ml-1 text-sm" >{{\carbon\carbon::parse($res['first_air_date'])->format('Y')}}</span>

								@endif
								<span class="ml-1 " >|</span>
								<span class="ml-1 text-sm" >(show)</span>
						@endif
						{{-- @if($res['media_type']=='person')
							<p>_{{$res['known_for_department']}}</p>
						@endif --}}
					</a>
				@endforeach
			@else
			<div class="px-3 py-3">no results for {{$search}}</div>
			@endif
		</div>
	@endif
</div>

