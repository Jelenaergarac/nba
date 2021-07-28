@extends('layouts.app')
@section('content')


<div>
    <h1>Name: {{ $team->name }}</h1>
    <h2>Email: {{ $team->email }}</h2>
    <h2>Address: {{ $team->address }}</h2>
    <h2>City: {{ $team->city }}</h2>

    <h1>Players</h1>
@forelse ($team->players as $player )
<li><a href="/players/{{$player->id}}">{{$player['first_name']}}</a></li>

@empty
<p>No players found</p>

@endforelse</li>


</div>
<hr>
<h3>Comments:</h3>
@foreach($team->comments as $comment)
<div>
    <h4><a href="/users/{{$comment->user->id}}">{{$comment->user->id}} {{$comment->user->name}}</a></h4>
    <blockquote>
        {{$comment->content}}
    </blockquote>
</div>
@endforeach

@auth
<form method="POST" action="{{route('team.comment', ['team'=>$team])}}">
    @csrf
   
    <div class="form-group">
        <textarea name="content" id="content" cols="50" rows="10" placeholder="Write your comment here..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth
@endsection