<h3>Characters</h3>

<p>
    Characters endpoint return information about main heroes, villains, enemies, etc
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('characters.get') }}" target="_blank">{{ route('characters.get') }}/{id}</a>

<pre id="jsonCharacter" class="jsonViewer"></pre>

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
        <th scope="row">game_id</th>
        <td>The identifier of the game</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">galaxy_id</th>
        <td>The identifier of the galaxy</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">race_id</th>
        <td>The identifier of the race/species</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">name</th>
        <td>Character name</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">gender</th>
        <td>Character gender (male/female/unknown)</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">state</th>
        <td>Character gender (alive/dead/lost/unknown)</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">eyes</th>
        <td>Character eyes color</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">skin</th>
        <td>Character skin color</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">hair</th>
        <td>Character hair color</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">image</th>
        <td>Path to the image</td>
        <td>string</td>
    </tr>
    </tbody>
</table>

<script type="module" lang="js">
    let url = "http://127.0.0.1:8000/api/v1/"

    fetch(url + "characters/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonCharacter").innerHTML = JSON.stringify(data, undefined, 2)
    })

</script>
