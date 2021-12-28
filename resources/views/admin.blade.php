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
                    <hr/>
                    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" style="padding-top: 50px">
                        @csrf
                        @method('PUT')

                        id: {{ $game->id }}
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $game->title }}">
                        </div>

                        <div class="form-group">
                            <label for="title">subtitle</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $game->subtitle }}">
                        </div>
                        {{ $game->image }}
                        <div class="form-group">
                            <label for="image">image</label>
                            <img src="{{ asset('images/' . $game->image)  }}" width="100" alt="image">
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
                            <label for="platform">Platform: </label>
                            <select id="platform" name="platform" class="form-control">
{{--                                @foreach($games->)--}}
                                <option value="ps2">PlayStation 2</option>
                                <option value="ps3">PlayStation 3</option>
                                <option value="psp">PlayStation Portable</option>
                                <option value="psvita">PlayStation Vita</option>
                                <option value="ps4">PlayStation 4</option>
                                <option value="ps5">PlayStation 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Releases:
                            <div class="releases">
                                @foreach($game->releases as $release)
                                    <input type="date" name="date[]" value="{{ $release->date }}">
                                    <input type="text" name="region[]" value="{{ $release->region }}">
                                    <br>
                                @endforeach
                            </div>
                            <button id="addRelease" type="button" class="btn btn-secondary">Add</button>
                            <button id="removeRelease" type="button" class="btn btn-secondary">Remove</button>
                        </div>

                        <div class="form-group">
                            <label for="approve">approve</label>
                            <input type="checkbox" class="form-control" id="approve" name="approve" value="{{ $game->approve }}">
                        </div>
                        {{ $game }}<br/>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        let releases = document.querySelector('.releases')
        let addRelease = document.querySelector('#addRelease')
        let removeRelease = document.querySelector('#removeRelease')

        addRelease.addEventListener('click', () => {
            const switchElements = ["EU", "JP", "NA"]
            let switchInput = document.createElement('select')
            switchInput.setAttribute('type', 'switch')
            switchInput.setAttribute('name', 'region[]')

            for (let i = 0; i < switchElements.length; i++) {
                let option = document.createElement('option')
                option.value = switchElements[i]
                option.text = switchElements[i]
                switchInput.appendChild(option)
            }

            let dateInput = document.createElement('input')
            dateInput.setAttribute('type', 'date')
            dateInput.setAttribute('name', 'date[]')

            let removeButton = document.createElement('button')
            removeButton.setAttribute('type', 'button')
            removeButton.setAttribute('name', 'removeRelease')
            removeButton.setAttribute('class', 'btn btn-danger')
            const text = document.createTextNode('Remove')
            removeButton.appendChild(text)

            const release = document.createElement('div')
            release.setAttribute('class', 'release')

            release.appendChild(dateInput)
            release.appendChild(switchInput)
            // release.appendChild(removeButton)
            release.appendChild(document.createElement('br'))

            releases.appendChild(release)
        })

        removeRelease.addEventListener('click', () => {
            let releases = document.querySelector('.releases')
            releases.innerHTML = ""
        })

    </script>
@endsection
