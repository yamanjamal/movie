<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ShowViewModel extends ViewModel
{

	public $movie;

    public function __construct($movie)
    {
    	$this->movie=$movie;
        
    }

    public function movie(){

		// return $this->movie;
    	return collect($this->movie)->merge([
    			'poster_path'=>'https://image.tmdb.org/t/p/w500'.$this->movie['poster_path'],
    			'vote_average'=> $this->movie['vote_average']*10 .'%' ,
    			'release_date'=>isset($this->movie['release_date']) ? \carbon\carbon::parse($this->movie['release_date'])->format('M D ,Y'):null,
    			'genres'=>collect($this->movie['genres'])->pluck('name')->flatten()->implode(', ' ),
    			'crew'=> collect($this->movie['credits']['crew'])->take(3) ,
    			'cast'=> collect($this->movie['credits']['cast'])->take(6) ,
    			'images'=> collect($this->movie['images']['backdrops'])->take(9) ,
                'vote_count'=> $this->movie['vote_count'],
                'vote_average'=> $this->movie['vote_average'],
                ''
    		])->only([
    			'poster_path','vote_average','release_date' ,'genres','crew','cast','images','title','overview'
    			,'id','release_date','videos','credits','vote_count','vote_average'
    		]);
    	
    }

}
