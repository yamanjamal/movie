@extends('layouts.main')
@section('title','movies')
@section('content')

<div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
    <ul class="flex flex-col md:flex-row items-center">
        <li>
            <a href="https://movies.andredemos.ca">
                <img src="{{ asset('img/pop.webp') }}" height="40" width="40"> 
            </a>
        </li>
        <li class="md:ml-16 mt-3 md:mt-0">
            <a href="https://movies.andredemos.ca" class="hover:text-gray-300">Movies</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
            <a href="https://movies.andredemos.ca/tv" class="hover:text-gray-300">TV Shows</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
            <a href="https://movies.andredemos.ca/actors" class="hover:text-gray-300">Actors</a>
        </li>
    </ul>
  <div class="flex flex-col md:flex-row items-center">
      <div wire:id="deKAx5y6g6eDAHW34pUi" class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
          <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search (Press '/' to focus)" x-ref="search" @keydown.window="
                if (event.keyCode === 191) {
                    event.preventDefault();
                    $refs.search.focus();
                }
            " @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false">
          <div class="absolute top-0">
              <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"></path></svg>
          </div>
          <div wire:loading="" class="spinner top-0 right-0 mr-4 mt-3"></div>
      </div>
          <div class="md:ml-4 mt-3 md:mt-0">
              <a href="#">
                  <img src="/img/avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
              </a>
        </div>
    </div>
</div>
@stop