@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Weapon 🔫</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('weapons.store') }}" enctype="multipart/form-data" style="padding: 50px 0">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="game_id">First appearance: </label><br>
                        <select name="game_id" id="game_id">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->title }} {{ $game->subtitle }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('games.create') }}">Add new game</a>
                    </div>

                    <div class="form-group">
                        <label for="price">Price: </label>
                        <input type="number" class="form-control" id="price" name="price" min="0">
                    </div>

                    <div class="form-group">
                        <label for="range">Range: </label><br>
                        <select name="range" id="range">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="melee">Melee</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rate_of_fire">Rate Of Fire: </label><br>
                        <select name="rate_of_fire" id="rate_of_fire">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">First level weapon image: </label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <hr>
                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Weapon Upgrade 🔫</h1>
                </div>






                <form method="post" action="{{ route('weaponsEvolution.store') }}" enctype="multipart/form-data" style="padding: 50px 0">
                @csrf

                    <div class="form-group">
                        <label for="weapon_id">Select weapon: </label><br>
                        <select name="weapon_id" id="weapon_id">
                            @foreach($weapons as $weapon)
                                <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Upgraded Weapon New Name: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="level">Max level: </label>
                        <input type="number" class="form-control" id="level" name="level" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Upgrade price: </label>
                        <input type="number" class="form-control" id="price" name="price" min="0">
                    </div>

                    <div class="form-group">
                        <label for="range">Upgraded Weapon Range: </label><br>
                        <select name="range" id="range">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="melee">Melee</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="rate_of_fire">Upgraded Weapon Rate Of Fire: </label><br>
                        <select name="rate_of_fire" id="rate_of_fire">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Upgraded weapon Image: </label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
