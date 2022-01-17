<h3>Galaxies</h3>

<p>
    Galaxies endpoint
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('galaxies.get') }}">{{ route('galaxies.get') }}/{id}</a>

<pre id="jsonGalaxies" class="jsonViewer"></pre>

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
        <th scope="row">name</th>
        <td>The name of the galaxy</td>
        <td>string</td>
    </tr>
    </tbody>
</table>

<script type="module" lang="js">
    let url = "http://127.0.0.1:8000/api/v1/"

    fetch(url + "galaxies/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonGalaxies").innerHTML = JSON.stringify(data, undefined, 2)
    })

</script>
