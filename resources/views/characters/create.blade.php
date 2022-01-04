@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Character 🧑</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('characters.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="32">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender: </label>
                        <select name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unknown">Unknown</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state">State: </label>
                        <select name="state" id="state">
                            <option value="alive">Alive</option>
                            <option value="dead">Dead</option>
                            <option value="lost">Lost</option>
                            <option value="unknown">Unknown</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="eyes">Eyes color: </label>
                        <input type="text" class="form-control" id="eyes" name="eyes" maxlength="12">
                    </div>

                    <div class="form-group">
                        <label for="skin">Skin color: </label>
                        <input type="text" class="form-control" id="skin" name="skin" maxlength="12">
                    </div>

                    <div class="form-group">
                        <label for="hair">Hair color: </label>
                        <input type="text" class="form-control" id="hair" name="hair" maxlength="12">
                    </div>

                    <div class="form-group">
                        <label for="image">Image: </label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="game_id">First appearance: </label>
                        <select name="game_id" id="game_id">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->title }} {{ $game->subtitle }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('games.create') }}">Add new game</a>
                    </div>

                    <div class="form-group">
                        <label for="race_id">Race: </label>
                        <select name="race_id" id="race_id">
                            @foreach($races as $race)
                                <option value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('races.create') }}">Add new race</a>
                    </div>

                    <div class="form-group">
                        <label for="galaxy_id">Galaxy: </label>
                        <select name="galaxy_id" id="galaxy_id">
                            @foreach($galaxies as $galaxy)
                                <option value="{{ $galaxy->id }}">{{ $galaxy->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('galaxies.create') }}">Add new galaxy</a>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
