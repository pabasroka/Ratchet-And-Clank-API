@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Gadget 🧰</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('gadgets.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
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
                        <label for="image">Image: </label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
