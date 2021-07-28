@extends('layouts.app')

@section('content')


<div>
    @foreach ($players as $player )
    <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
        
    @endforeach
</div>
@endsection