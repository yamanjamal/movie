<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TopRatedViewModel extends ViewModel
{
	public $toprated;
	public $genres;
    public  $page;
    public  $rout;



    public function __construct($toprated,$genres,$page,$rout)
    {
        $this->toprated=$toprated;
        $this->genres=$genres;
        $this->page=$page;
        $this->rout=$rout;

    }

    public function page(){

        return $this->page;
    }

    public function rout(){

        return $this->rout;
    }
    public function genres(){

	    	// return $this->genres;
	      return collect($this->genres)->mapWithKeys(function ($genre){
	        return [$genre['id']=>$genre['name']];
	      });    
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
    			'poster_path'=>'https://image.tmdb.org/t/p/w500'.$movie['poster_path'],
    			'vote_average'=> $movie['vote_average']*10 .'%' ,
    			'release_date'=>isset($movie['release_date'])?\carbon\carbon::parse($movie['release_date'])->format('Y'):null,
    			'genres'=>$gonreform,
    		])->only([
    		'poster_path','id','release_date','vote_average','genres','title','overview','genre_ids'
    			]);

    	});
    }        
}
