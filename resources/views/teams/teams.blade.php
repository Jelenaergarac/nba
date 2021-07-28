@extends('layouts.app')

@section('content')


    @foreach ($teams as $team )
    
    <li><a href="/teams/{{ $team->id }}">{{ $team->name }}</a></li>
        
    @endforeach


@endsection