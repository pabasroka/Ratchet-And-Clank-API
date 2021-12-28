@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                to jest widoczne dla wszystkich <br/>

                <a href="{{ route('games.create') }}">Add new game 🎮</a><br>

                <a href="{{ route('races.create') }}">Add new race 👽</a><br>

                <a href="{{ route('galaxies.create') }}">Add new galaxy 🌌</a><br>


            </div>
        </div>
    </div>
@endsection
