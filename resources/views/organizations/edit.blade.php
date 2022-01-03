@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @foreach ($organizations as $organization)
                    <hr/>
                    <form action="{{ route('organizations.update', $organization->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                        @csrf
                        @method('PUT')

                        {{ $organization }}

                        <div class="form-group">
                            <label for="approve">approve</label>
                            <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $organization->approve }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>

                    </form>
                    <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
