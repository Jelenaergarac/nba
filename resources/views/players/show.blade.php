@extends('layouts.app')
@section('content')

<div>
 
    <h1>   Player: {{ $player->first_name }} {{ $player->last_name }}</h1>

<h2>Email: {{ $player->email }}</h2>
{{-- @foreach ($player->teams as $team)
    <h3><a href="/teams/{{ $player->team->id}}">{{ $player->team->name }}</a></h3>
@endforeach --}}
@endsection