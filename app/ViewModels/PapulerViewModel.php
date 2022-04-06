<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class PapulerViewModel extends ViewModel
{
	public $genres;
	public $papuler;


    public function __construct($papuler,$genres)
    {
        $this->papuler=$papuler;
        $this->genres=$genres;
    }

    public function genres(){

	    	// return $this->genres;
	      return collect($this->genres)->mapWithKeys(function ($genre){
	        return [$genre['id']=>$genre['name']];
	      });    
    }

    public function papuler(){

        return  $this->GETFORMAT($this->papuler);
    }

    private function GETFORMAT($movies){

    	return collect($movies)->map(function($movie){
	    	$gonreform=collect($movie['genre_ids'])->mapWithKeys(function ($value){
	        return [$value=>$this->genres()->get($value)];
	      })->implode(', ');

    		return collect($movie)->merge([
    			'poster_path'=>'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
    			'vote_average'=> $movie['vote_average']*10 .'%' ,
    			'release_date'=>isset($movie['release_date']) ? \carbon\carbon::parse($movie['release_date'])->format('Y'):null,
    			'genres'=>$gonreform,
    		])->only([
    		'poster_path','id','release_date','vote_average','genres','title','overview','genre_ids'
    			]);

    	});
    }    
}
