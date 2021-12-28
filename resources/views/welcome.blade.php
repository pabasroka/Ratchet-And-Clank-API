@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                to jest widoczne dla wszystkich <br/>

                <a href="{{ route('games.create') }}">🎮 Add New Game 🎮</a><br>

                <a href="{{ route('races.create') }}">👽 Add New Race 👽</a><br>

                <a href="{{ route('galaxies.create') }}">🌌 Add New Galaxy 🌌</a><br>

                <a href="{{ route('planets.create') }}">🌍 Add New Planet 🌍</a><br>

            </div>
        </div>
    </div>
@endsection
