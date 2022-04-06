<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\http;

class ActorsController extends Controller
{
    public function gettoken(){
        return 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGJiY2RjODA2MWNkNGRhMWIzN2MxN2UxNjNlNTMxMCIsInN1YiI6IjYwNzE2NmZhODM5ZDkzMDA3NzQzZThlMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ZmJvI7XGMuTo7F-qbqQhTzeuVQUtEc1m9s3DW7p-tJI';
    }
    public function index($page)
    {
      $rout='actor';   
      $token=$this->gettoken();
      $papuler_actors=Http::withToken($token)
      ->get('https://api.themoviedb.org/3/person/popular/?page='.$page)->json()['results'];        
        // dump($papuler_actors);
      
      return  view('/actors/index',[
        'papuler_actors'=>$papuler_actors,
        'rout'=>$rout,
        'page'=>$page,

      ]);
    }

    public function show($id)
    {
      $token=$this->gettoken();
      $actor=Http::withToken($token)
      ->get('https://api.themoviedb.org/3/person/'.$id.'?append_to_response=credits,images')->json();
      $credits=Http::withToken($token)
      ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')->json();
      // dump($actor); 
      // dump($credits);
        return view('/actors/show',[
          'actor'=>$actor,
          'credits'=>$credits
      ]);
    }

    public function knownfor($id)
    {
      $token=$this->gettoken();
      $actor=Http::withToken($token)
      ->get('https://api.themoviedb.org/3/person/'.$id.'?append_to_response=credits,images')->json();
      // dump($actor);
        return view('/actors/actorsKnownFor',[
          'actor'=>$actor
      ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
