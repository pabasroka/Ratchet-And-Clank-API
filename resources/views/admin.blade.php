@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                Tutaj bedzie panel zarządzania (akceptowanie dodania rekordów do bazy) <br/>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @foreach ($games as $game)
                    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}">
                        </div>

                        <div class="form-group">
                            <label for="title">subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $game->subtitle }}">
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{ $game->image }}">
                        </div>
                        <div class="form-group">
                            <label for="developers">developers</label>
                            <input type="text" class="form-control" id="developers" name="developers" value="{{ $game->developers }}">
                        </div>
                        <div class="form-group">
                            <label for="directors">directors</label>
                            <input type="text" class="form-control" id="directors" name="directors" value="{{ $game->directors }}">
                        </div>
                        <div class="form-group">
                            <label for="composer">composer</label>
                            <input type="text" class="form-control" id="composer" name="composer" value="{{ $game->composer }}">
                        </div>
                        <div class="form-group">
                            <label for="approve">approve</label>
                            <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $game->approve }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                    <hr/>
                @endforeach

            </div>
        </div>
    </div>
@endsection
