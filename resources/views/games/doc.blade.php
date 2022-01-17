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

<script lang="js">
    let url = "http://127.0.0.1:8000/api/v1/"

    fetch(url + "games/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonGames").innerHTML = JSON.stringify(data, undefined, 2);
    })

</script>
