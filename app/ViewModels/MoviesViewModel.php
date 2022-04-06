<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
	public $papuler_movies;
	public	$genres;
	public	$nowplaying;
    public  $toprated;
    // public  $genresfornav;
    public function __construct( $papuler_movies,$genres,$nowplaying,$toprated )
    {
        $this->papuler_movies=$papuler_movies;   
        $this->genres=$genres;   
        $this->nowplaying=$nowplaying;   
        $this->toprated=$toprated;

           
        // $this->genresfornav=$genresfornav;   
    }   
    public function papuler_movies(){

    	// return $this->papuler_movies;
    	return $this->GETFORMAT($this->papuler_movies);
    }

    // public function genresfornav(){

    //     return $this->genresfornav;
    // }

    // public function page(){

    //     return $this->page;
    // }


    public function genres(){

    	// return $this->genres;
      return collect($this->genres)->mapWithKeys(function ($genre){
        return [$genre['id']=>$genre['name']];
      });

    }

    public function nowplaying(){

    	return  $this->GETFORMAT($this->nowplaying);
    }
    public function toprated(){

        return  $this->GETFORMAT($this->toprated);
    }

    private function GETFORMAT($movies){


    	return collect($movies)->map(function($movie){

	    	$gonreform=collect($movie['genre_ids'])->mapWithKeys(function ($value){
	           return [$value=>$this->genres()->get($value)];
	        })->implode(', ');

        	return collect($movie)->merge([
        			'poster_path'=>'https://image.tmdb.org/t/p/w300'.$movie['poster_path'],
        			'vote_average'=> $movie['vote_average'] ,
        			'release_date'=> isset($movie['release_date'])?\carbon\carbon::parse($movie['release_date'])->format('Y'):null,
        			'genres'=>$gonreform,
        		      ])->only([
        		      'poster_path','id','release_date','vote_average','genres','title','overview','genre_ids','backdrop_path'
        			]);
        	});
    }


}
