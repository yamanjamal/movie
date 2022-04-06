<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\http;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use App\ViewModels\TopRatedTvViewModel;
use App\ViewModels\NowPlayingTvViewModel;
use App\ViewModels\PapulerTvViewModel;

class TvController extends Controller
{


    public function gettoken(){
        return 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGJiY2RjODA2MWNkNGRhMWIzN2MxN2UxNjNlNTMxMCIsInN1YiI6IjYwNzE2NmZhODM5ZDkzMDA3NzQzZThlMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZmJvI7XGMuTo7F-qbqQhTzeuVQUtEc1m9s3DW7p-tJI';
    }
    public function index()
    {   

        $token=$this->gettoken();
          $papuler_tv=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        
          $topratedgtv=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
         
          $nowplaying=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/on_the_air')->json()['results'];
        
          $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
                
        
          // $genres=collect($genres_arr)->mapWithKeys(function ($genre){
          //   return [$genre['id']=>$genre['name']];
          // });
          $viewModel = new TvViewModel(
              $papuler_tv,
              $genres,
              $topratedgtv,
              $nowplaying,
           );

              // dump($papuler_tv);

         return view('/tv_shows/index', $viewModel);

            // return view('/tv_shows/index',[
                // 'papuler_tv'=>$papuler_tv,
                // 'genres'=>$genres,
                // 'nowplaying'=>$nowplaying
                // ]);

                    // return view('/tv_shows/index');
    }

    public function toprated($page)
    {
      $rout='tv_toprated';

        $token=$this->gettoken();
        $topratedgtv=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/top_rated/?page='.$page)->json()['results'];
        $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];  
          $viewModel = new TopRatedTvViewModel(
              $topratedgtv,
              $genres,
           );
         return view('/tv_shows/toprated', $viewModel,['rout'=>$rout,'page'=>$page]); 
    }
    public function nowplaying($page)
    {
      $rout='tv_nowplaying';

      $token=$this->gettoken();
      $nowplaying=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/on_the_air/?page='.$page)->json()['results'];  
      $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
          $viewModel = new NowPlayingTvViewModel(
              $nowplaying,
              $genres,
           );


         return view('/tv_shows/nowplaying', $viewModel,['rout'=>$rout,'page'=>$page]);

    }


    public function papuler($page)
    {
      $rout='tv_papuler';

        $token=$this->gettoken();
       $papuler_tv=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/tv/popular/?page='.$page)->json()['results']; 
        $genres=Http::withToken($token)
          ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];

          // dump($papuler_tv);
          $viewModel = new PapulerTvViewModel(
              $papuler_tv,
              $genres,
           );

         return view('/tv_shows/papuler', $viewModel,['rout'=>$rout,'page'=>$page]);
    }


    public function show($id)
    {

        $token=$this->gettoken();
          // $tvshows=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        
        $tvshows=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')->json();
/*        $movie=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')->json();*/
          // $topratedgtv=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
        
          // $genres=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
                
        

                $viewModel = new TvShowViewModel(
                $tvshows,
                // $genres,
                // $topratedgtv,
            );

              // dump($papuler_tv);

         return view('/tv_shows/show', $viewModel);
      // // dump($movie);

      //   return view('/movies/show',[
      //       'movie'=>$movie,
      //       'genres'=>$genres,

      //   ]);

    }  

    public function season ($id,$season)
    {

        $token=$this->gettoken();
          // $tvshows=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        $tvshows=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')->json();

        $tvseasons=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'/season/'.$season.'?append_to_response=credits,videos,images')->json();
/*        $movie=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')->json();*/
          // $topratedgtv=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
        
          // $genres=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
                
        

                // $viewModel = new TvShowViewModel(
                // $tvshows,
                // $genres,
                // $topratedgtv,
            // );

              // dump($tvshows);
              // dump($tvseasons);

         return view('/tv_shows/showseason',['tvseasons'=>$tvseasons , 'tvshows'=>$tvshows]);
      // // dump($movie);

      //   return view('/movies/show',[
      //       'movie'=>$movie,
      //       'genres'=>$genres,

      //   ]);
    }




    public function episode ($id,$season,$episode)
    {

        $token=$this->gettoken();
          // $tvshows=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/popular')->json()['results'];
        $tvshows=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')->json();
        $episode=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'/season/'.$season.'/episode/'.$episode.'?append_to_response=credits,videos,images')->json();
        $tvseasons=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/tv/'.$id.'/season/'.$season.'?append_to_response=credits,videos,images')->json();
/*        $movie=Http::withToken($token)
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')->json();*/
          // $topratedgtv=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/tv/top_rated')->json()['results'];
        
          // $genres=Http::withToken($token)
          // ->get('https://api.themoviedb.org/3/genre/tv/list')->json()['genres'];
                
        

                // $viewModel = new TvShowViewModel(
                // $tvshows,
                // $genres,
                // $topratedgtv,
            // );

              // dump($tvshows);
              // dump($episode);
              // dump($tvseasons);

         return view('/tv_shows/showepisode',['episode'=>$episode,'tvseasons'=>$tvseasons , 'tvshows'=>$tvshows]);
      // // dump($movie);

      //   return view('/movies/show',[
      //       'movie'=>$movie,
      //       'genres'=>$genres,

      //   ]);
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
        public function create()
    {
        //
    } 


    public function store(Request $request)
    {
        //
    }
}
