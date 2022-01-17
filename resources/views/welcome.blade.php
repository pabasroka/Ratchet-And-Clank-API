@extends('layouts.docNav')

@section('content')
    <div class="row justify-content-center py-sm-4">
        <div class="col-md-8" style="padding-top: 50px; color: white;">

            <div id="information">

                <p>
                    To search on page specific resource use shortcut <strong>CTRL + F</strong>
                </p>

                <h3> Information </h3>

                <p>
                    Ratchet & Clank API allows you to use HTTP GET request.
                    Moreover you can add data to API,
                    but each POST request will be considered by the administrator.
                    To add data <a href="{{ route('data') }}">click here</a> or choose "Add data" from sidebar navigation.
                </p>

                <h3> API License </h3>

                <p>
                    Some information about licence...
                </p>

                <h3> Contact </h3>

                <p>
                    Have Any Question? Ask Me:
                    <a href="mailto:patryksroczynski13@gmail.com">
                        patryksroczynski13@gmail.com
                    </a>
                </p>

            </div>

            <hr>
            <div id="games" class="endpoint">
                @include('games.doc')
            </div>

            <hr>
            <div id="characters" class="endpoint">
                @include('characters.doc')
            </div>

            <hr>
            <div id="galaxies" class="endpoint">
                galaxies
            </div>

            <hr>
            <div id="planets" class="endpoint">
                planets
            </div>

            <hr>
            <div id="weapons" class="endpoint">
                weapons
            </div>

            <hr>
            <div id="gadgets" class="endpoint">
                gadgets
            </div>

            <hr>
            <div id="vehicles" class="endpoint">
                vehicles
            </div>

            <hr>
            <div id="skillpoints" class="endpoint">
                skillpoints
            </div>

            <hr>
            <div id="organizations" class="endpoint">
                organizations
            </div>

            <hr>
            <div id="races" class="endpoint">
                races
            </div>

        </div>
    </div>


@endsection
