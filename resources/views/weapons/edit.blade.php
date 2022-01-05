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

                @foreach ($weapons as $weapon)
                    <hr/>
                    <form action="{{ route('weapons.update', $weapon->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                        @csrf
                        @method('PUT')

                        {{ $weapon }}

                        <div class="form-group">
                            <label for="approve">approve</label>
                            <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $weapon->approve }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>

                    </form>
                    <form action="{{ route('weapons.destroy', $weapon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endforeach



                @if(isset($weapons->weaponsEvolution))
                        <hr>
                    @foreach ($weapons as $weapon)
                        @foreach($weapon->weaponsEvolution as $item)
                            {{ dd($item) }}
                        <hr/>
                        <form action="{{ route('weapons.update', $weapon->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                            @csrf
                            @method('PUT')

                            {{ $weapon }}

                            <div class="form-group">
                                <label for="approve">approve</label>
                                <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $weapon->approve }}">
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>

                        </form>
                        <form action="{{ route('weapons.destroy', $weapon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                            @endforeach
                    @endforeach
                @endif

            </div>
        </div>
    </div>

@endsection
