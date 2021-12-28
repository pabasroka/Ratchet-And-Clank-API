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

                @foreach ($skillPoints as $skillPoint)
                    <hr/>
                    <form action="{{ route('skillpoints.update', $skillPoint->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                        @csrf
                        @method('PUT')

                        {{ $skillPoint }}

                        <div class="form-group">
                            <label for="approve">approve</label>
                            <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $skillPoint->approve }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>

                    </form>
                    <form action="{{ route('skillpoints.destroy', $skillPoint->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
