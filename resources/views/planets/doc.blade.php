<h3>Planets</h3>

<p>
    Planets endpoint return name, description, image
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('planets.get') }}">{{ route('planets.get') }}/{id}</a>

<pre id="jsonPlanets" class="jsonViewer"></pre>

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
        <th scope="row">galaxy_id</th>
        <td>The identifier of the galaxy</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">name</th>
        <td>The name of the planet</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">description</th>
        <td>The description of the planet (max length 500)</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">image</th>
        <td>Path to the image</td>
        <td>string</td>
    </tr>
    </tbody>
</table>

<script lang="js">
    url = "http://127.0.0.1:8000/api/v1/"

    fetch(url + "planets/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonPlanets").innerHTML = JSON.stringify(data, undefined, 2);
    })

</script>
