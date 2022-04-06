<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\http;


class SearchDropdown extends Component
{

	public $search='';
    public function render()
    {

    	$token='eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGJiY2RjODA2MWNkNGRhMWIzN2MxN2UxNjNlNTMxMCIsInN1YiI6IjYwNzE2NmZhODM5ZDkzMDA3NzQzZThlMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZmJvI7XGMuTo7F-qbqQhTzeuVQUtEc1m9s3DW7p-tJI';
    	$searchres=[];
    	if (strlen($this->search)>1) {
			$searchres=Http::withToken($token)
			->get('https://api.themoviedb.org/3/search/multi?query='.$this->search)->json()['results'];
    		 // dump($searchres);
    	}

        // dump($searchres);
        return view('livewire.search-dropdown',[
        	'searchres'=>collect($searchres)->take(7),

        ]);
    }
}
