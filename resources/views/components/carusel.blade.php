<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
      @foreach ($nowplaying as $movie)
        <div class="carousel-item 
        @if ($loop->first)
         active 
         @endif
         ">
          <img src="{{$movie['poster_path']}}" class=" d-block "  alt="..."  >
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$movie['title']}}</h5>
            <p>{{$movie['genres']}}</p>
        </div>
        </div>

      @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


