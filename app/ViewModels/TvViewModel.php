<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
	public $papuler_tv;
	public $genres;
	public $topratedgtv;
    public $nowplaying;

    public function __construct($papuler_tv,$genres,$topratedgtv,$nowplaying)
    {
        $this->papuler_tv=$papuler_tv;   
        $this->genres=$genres;   
        $this->topratedgtv=$topratedgtv;   
        $this->nowplaying=$nowplaying;   
        
    }

    // public function papuler_movies(){

    // 	return $this->papuler_tv;
    // }
    public function papuler_tv(){

    	// return $this->papuler_movies;
    	return $this->GETFORMAT($this->papuler_tv);
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

    public function topratedgtv(){

    	return  $this->GETFORMAT($this->topratedgtv);;
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
    			'first_air_date'=>isset($tvshow['first_air_date'])?\carbon\carbon::parse($tvshow['first_air_date'])->format('Y'):null,
    			'genres'=>$gonreform,
                
    		])->only([
    			'poster_path','id','release_date','vote_average','genres','name','overview','genre_ids','first_air_date'
    			]);
    	});
    }    
}
