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
                <h3>Games</h3>

                <p>
                    Games endpoint return information about all Ratchet & Clank games, releases date, platforms
                </p>

                <h5>Endpoint: </h5>
                <span class="http">GET</span>
                <a href="{{ route('games.get') }}">{{ route('games.get') }}/{id}</a>

                <pre id="jsonGames" class="jsonViewer"></pre>

                <h5>Type: </h5>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">id</th>
                            <td>The identifier for this resource</td>
                            <td>integer</td>
                        </tr>
                        <tr>
                            <th scope="row">title</th>
                            <td>The title of the game</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">subtitle</th>
                            <td>The subtitle of the game</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">image</th>
                            <td>Path to the image</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">developers</th>
                            <td>Name of developers</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">directors</th>
                            <td>Name of the directors</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">composer</th>
                            <td>Name of the composer</td>
                            <td>string</td>
                        </tr>
                        <tr>
                            <th scope="row">releases</th>
                            <td>Array of the releases. Includes id, region, date</td>
                            <td>array</td>
                        </tr>
                        <tr>
                            <th scope="row">platforms</th>
                            <td>Array of the platforms. Includes id, name</td>
                            <td>array</td>
                        </tr>
                        <tr>
                            <th scope="row">skill points</th>
                            <td>Array of the skill points. Includes id, name, description</td>
                            <td>array</td>
                        </tr>
                        <tr>
                            <th scope="row">vehicles</th>
                            <td>Array of the vehicles. Includes id, name, image</td>
                            <td>array</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <hr>
            <div id="characters" class="endpoint">
                characters
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

    <script lang="js">
        const url = "http://127.0.0.1:8000/api/v1/"

        fetch(url + "games/1").then(response => response.json()).then(data => {
            console.log(data)
            document.querySelector("#jsonGames").innerHTML = JSON.stringify(data, undefined, 2);
        })

    </script>
@endsection
