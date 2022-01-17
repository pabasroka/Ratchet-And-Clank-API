<h3>Vehicles</h3>

<p>
    Vehicles endpoint
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('vehicles.get') }}" target="_blank">{{ route('vehicles.get') }}/{id}</a>

<pre id="jsonVehicles" class="jsonViewer"></pre>

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
        <th scope="row">name</th>
        <td>The name of the gadget</td>
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

    fetch(url + "vehicles/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonVehicles").innerHTML = JSON.stringify(data, undefined, 2);
    })

</script>
