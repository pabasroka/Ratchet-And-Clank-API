@extends('layouts.app')

@section('content')
<div class="wrapper">
    <form method="post" action="{{ route('games.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="title">subtitle</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="developers">developers</label>
            <input type="text" class="form-control" id="developers" name="developers">
        </div>
        <div class="form-group">
            <label for="directors">directors</label>
            <input type="text" class="form-control" id="directors" name="directors">
        </div>
        <div class="form-group">
            <label for="composer">composer</label>
            <input type="text" class="form-control" id="composer" name="composer">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
