<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class NowPlayingTvViewModel extends ViewModel
{
    public $nowplaying;
	public $genres;
    public function __construct($nowplaying,$genres)
    {
        $this->nowplaying=$nowplaying;
        $this->genres=$genres;   
    }
    public function nowplaying(){
        // return $this->papuler_movies;
        return $this->GETFORMAT($this->nowplaying);
    }


    public function genres(){
    	// return $this->genres;
      return collect($this->genres)->mapWithKeys(function ($genre){
        return [$genre['id']=>$genre['name']];
      });


    }

    private function GETFORMAT($tv){
    	// return collect($tv)->map(function($tvshow){
    	// 	return $tvshow;
    	// 	});

    	return collect($tv)->map(function($tvshow){
	    	$gonreform=collect($tvshow['genre_ids'])->mapWithKeys(function ($value){
	        return [$value=>$this->genres()->get($value)];
	      })->implode(', ');

    		return collect($tvshow)->merge([
    			'poster_path'=>'https://image.tmdb.org/t/p/w500'.$tvshow['poster_path'],
    			'vote_average'=> $tvshow['vote_average']*10 .'%' ,
    			'first_air_date'=>isset($tvshow['first_air_date']) ?\carbon\carbon::parse($tvshow['first_air_date'])->format('Y'):null,
    			'genres'=>$gonreform,
    		])->only([
    			'poster_path','id','release_date','vote_average','genres','name','overview','genre_ids','first_air_date'
    			]);
    	});
    }     
}
