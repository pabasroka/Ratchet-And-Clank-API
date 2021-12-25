@extends('layouts.app')

@section('content')
<div class="wrapper">
    <form method="post" action="{{ route('games.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="form-group">
            <label for="title">subtitle</label>
            <input type="text" class="form-control" id="subtitle">
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="image">image</label>--}}
{{--            <input type="file" class="form-control" id="image">--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="developers">developers</label>
            <input type="text" class="form-control" id="developers">
        </div>
        <div class="form-group">
            <label for="directors">directors</label>
            <input type="text" class="form-control" id="directors">
        </div>
        <div class="form-group">
            <label for="composer">composer</label>
            <input type="text" class="form-control" id="composer">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
