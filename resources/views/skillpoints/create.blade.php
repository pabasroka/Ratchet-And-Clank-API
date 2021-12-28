@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Skill Point 🏆</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('skillpoints.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description: </label><br>
                        <textarea name="description" id="description" cols="70" rows="7" maxlength="500" placeholder="Short description about skill point"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="game_id">Game: </label>
                        <select name="game_id" id="game_id">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->title }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('games.create') }}">Add new game (jump into game form)</a>
                    </div>

                    <div class="form-group">
                        <label for="planet_id">Planet: </label>
                        <select name="planet_id" id="planet_id">
                            @foreach($planets as $planet)
                                <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('planets.create') }}">Add new planet (jump into planet form)</a>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
