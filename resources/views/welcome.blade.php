@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                to jest widoczne dla wszystkich

                Dodaj nową grę
                <a href="{{ route('games.create') }}">Dodaj</a>

            </div>
        </div>
    </div>
@endsection
