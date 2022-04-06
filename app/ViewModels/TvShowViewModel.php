<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
	public $tvshows;

    public function __construct($tvshows)
    {
    	$this->tvshows=$tvshows;
        
    }

    public function tvshows(){

		// return $this->tvshows;
    	return collect($this->tvshows)->merge([
    			'poster_path'=>'https://image.tmdb.org/t/p/w500'.$this->tvshows['poster_path'],
    			'vote_average'=> $this->tvshows['vote_average']*10 .'%' ,
    			'first_air_date'=>isset($this->tvshows['first_air_date'])?\carbon\carbon::parse($this->tvshows['first_air_date'])->format('M D ,Y'):null,
    			'genres'=>collect($this->tvshows['genres'])->pluck('name')->flatten()->implode(', ' ),
    			'crew'=> collect($this->tvshows['credits']['crew'])->take(3) ,
    			'cast'=> collect($this->tvshows['credits']['cast'])->take(6) ,
    			'images'=> collect($this->tvshows['images']['backdrops'])->take(9) ,
                'number_of_seasons'=>$this->tvshows['number_of_seasons'],
    		])->only([
    			'poster_path','vote_average','release_date' ,'genres','crew','cast','images','name','overview'
    			,'id','first_air_date','videos','credits','number_of_seasons',
    		]);
    	
    }
}
