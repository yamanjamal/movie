<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\ShowViewModel;
use App\ViewModels\TopRatedViewModel;
use App\ViewModels\NowPlayingViewModel;
use App\ViewModels\PapulerViewModel;


class MoviesController extends Controller
{

   // private  $token;


    public function __construct()
    {
       // this->$token='eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGJiY2RjODA2MWNkNGRhMWIzN2MxN2UxNjNlNTMxMCIsInN1YiI6IjYwNzE2NmZhODM5ZDkzMDA3NzQzZThlMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZmJvI7XGMuTo7F-qbqQhTzeuVQUtEc1m9s3DW7p-tJI';
    }

    public function gettoken(){
        return 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGJiY2RjODA2MWNkNGRhMWIzN2MxN2UxNjNlNTMxMCIsInN1YiI6IjYwNzE2NmZhODM5ZDkzMDA3NzQzZThlMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZmJvI7XGMuTo7F-qbqQhTzeuVQUtEc1m9s3DW7p-tJI';
    }
    public function index()
    {
        $token=$this->gettoken();

        // $papuler=Http::withToken(config('servise.tmdb.token'))
        // ->get('https://api.themoviedb.org/3/movie/popular')->json();


          $papuler_movies=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

          $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];
          // $genresfornav=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];
                
          $nowplaying=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/movie/now_playing')->json()['results'];
        
                
          $toprated=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/movie/top_rated')->json()['results'];
        
          // $genres=collect($genres_arr)->mapWithKeys(function ($genre){
          //   return [$genre['id']=>$genre['name']];
          // });

        $viewModel = new MoviesViewModel(
                // $genresfornav,
                $papuler_movies,
                $genres,
                $nowplaying,
                $toprated,
            );
          // dump($nowplaying);
        
        return view('/movies/index',$viewModel);

              // dump($papuler_movies);
        // return view('/movies/index',[
        //     'papuler_movies'=>$papuler_movies,
        //     'genres'=>$genres,
        //     'nowplaying'=>$nowplaying
        // ]);
    }

    public function toprated($page)
    {
      $rout='movie_toprated';
        
       $token=$this->gettoken();
       $toprated=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/movie/top_rated/?page='.$page)->json()['results'];
       $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres']; 
          // dump($toprated);
        $viewModel = new TopRatedViewModel(
                $toprated,
                $genres,
                $page,
                $rout,
                
            );
        
        return view('/movies/toprated', $viewModel,['rout'=>$rout,'page'=>$page]);
    }
    public function nowplaying($page)
    {
        $rout='movie_nowplaying';   
       $token=$this->gettoken();
       $nowplaying=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/movie/now_playing/?page='.$page)->json()['results'];
        
       $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres']; 
        $viewModel = new NowPlayingViewModel(
                $nowplaying,
                $genres,

            );
        
        return view('/movies/nowplaying', $viewModel,['rout'=>$rout,'page'=>$page]);
    }
    public function papuler($page)
    {
      // for pagination
        $rout='movie_papuler';
        // api
       $token=$this->gettoken();
       $papuler=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/movie/popular/?page='.$page)->json()['results'];
       $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres']; 
          // to saprate the logic from view
        $viewModel = new PapulerViewModel(
                $papuler,
                $genres,
            );
        // dump($viewModel);
        return view('/movies/papuler', $viewModel ,['rout'=>$rout,'page'=>$page]);
    }

    public function create()
    {

    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

         $token=$this->gettoken();
      $movie=Http::withToken($token)
      ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')->json();
        
      // $genres_arr=Http::withToken($token)
      // ->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];

      // $genres=collect($genres_arr)->mapWithKeys(function ($genre){
      //   return [$genre['id']=>$genre['name']];
      // });

      // dump($movie);
        $viewModel = new ShowViewModel(
                $movie,
            );


        return view('/movies/show', $viewModel);
        // return view('/movies/show',[
        //     'movie'=>$movie,
        //     // 'genres'=>$genres,

        // ]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
