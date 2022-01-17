<h3>Gadgets</h3>

<p>
    Gadgets endpoint
</p>

<h5>Endpoint: </h5>
<span class="http">GET</span>
<a href="{{ route('gadgets.get') }}" target="_blank">{{ route('gadgets.get') }}/{id}</a>

<pre id="jsonGadgets" class="jsonViewer"></pre>

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
        <td>The identifier of the game the gadget first appeared in</td>
        <td>integer</td>
    </tr>
    <tr>
        <th scope="row">name</th>
        <td>The name of the gadget</td>
        <td>string</td>
    </tr>
    <tr>
        <th scope="row">price</th>
        <td>Gadget price</td>
        <td>decimal</td>
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

    fetch(url + "gadgets/1").then(response => response.json()).then(data => {
        document.querySelector("#jsonGadgets").innerHTML = JSON.stringify(data, undefined, 2);
    })

</script>
