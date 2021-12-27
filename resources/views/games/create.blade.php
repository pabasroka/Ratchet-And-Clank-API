@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('games.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
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
                    <div class="form-group">
                        <label for="platform">Platform: </label>
                        <select id="platform" name="platform" class="form-control">
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
                        <div class="releases"></div>
                        <button id="addRelease" type="button" class="btn btn-secondary">Add</button>
                        <button id="removeRelease" type="button" class="btn btn-secondary">Remove</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
