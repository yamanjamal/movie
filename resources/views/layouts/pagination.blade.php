<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item " tabindex="-1">
      <a class="page-link" href="{{ route('movie_toprated',$page-1) }}" aria-disabled="true">Previous</a>
    </li>
    @for ($i = 1; $i <=20 ; $i++) 
    <li class="page-item"><a class="page-link"  href="{{ route('movie_toprated',$i) }}">{{$i}}</a></li>
    @endfor
    <li class="page-item">
      <a class="page-link" href="{{ route($rout,$page+1) }}" >Next</a>
    </li>
  </ul>
</nav>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item " tabindex="-1">
      <a class="page-link" href="{{ route('movie_toprated',$page-1) }}" aria-disabled="true">Previous</a>
    </li>
    @for ($i = 1; $i <=20 ; $i++) 
    <li class="page-item"><a class="page-link"  href="{{ route('movie_toprated',$i) }}">{{$i}}</a></li>
    @endfor
    <li class="page-item">
      <a class="page-link" href="{{ route($rout ,$page+1) }}" >Next</a>
    </li>
  </ul>
</nav>
