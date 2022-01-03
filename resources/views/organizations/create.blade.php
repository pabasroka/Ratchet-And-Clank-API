@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Organization 🏭</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="post" action="{{ route('organizations.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="galaxy">Galaxy: </label>
                        <select name="galaxy_id" id="galaxy_id">
                            @foreach($galaxies as $galaxy)
                                <option value="{{ $galaxy->id }}">{{ $galaxy->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('galaxies.create') }}">Add new galaxy</a>
                    </div>

                    <div class="form-group">
                        <label for="description">Description: </label><br>
                        <textarea name="description" id="description" cols="70" rows="7" maxlength="500" placeholder="Short description about planet"></textarea>
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
