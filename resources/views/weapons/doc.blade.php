<h3>Weapons</h3>

<p>
    Weapons endpoint returns data about weapons and its upgraded version
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('weapons.get') }}">{{ route('weapons.get') }}/{id}</a>

<pre id="jsonWeapons" class="jsonViewer"></pre>

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
        <th scope="row">first_appearance</th>
        <td>The identifier of the game the weapon first appeared in</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">name</th>
        <td>The name of the weapon</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">price</th>
        <td>Weapon price</td>
        <td>decimal</td>
    </tr>
    <tr>
        <th scope="row">range</th>
        <td>Weapon range (low/medium/high/melee')</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">rate_of_fire</th>
        <td>Weapon range (low/medium/high')</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">image</th>
        <td>Path to the image</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">upgrade</th>
        <td>Weapon upgraded versions</td>
        <td>array</td>
    </tr>
    </tbody>
</table>

<script lang="js">
    url = "http://127.0.0.1:8000/api/v1/"

    fetch(url + "weapons/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonWeapons").innerHTML = JSON.stringify(data, undefined, 2);
    })

</script>
