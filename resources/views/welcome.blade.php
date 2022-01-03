@extends('layouts.app')

@section('content')
    <div class="container bg-secondary">
        <div class="row justify-content-center bg-secondary">
            <div class="col-md-8 bg-secondary">

                <div class="p-5 text-center bg-secondary">
                    <h1 class="mb-3">Add Data Request To API</h1>
                    <h3 class="mb-3">The Data Will Be Available After Approval By The Administrator</h3>
                    <h6 class="mb-3">Have Any Question? Ask Me:</h6>
                    <h6 class="mb-3">
                        <a href="mailto:patryksroczynski13@gmail.com" class="text-white secret">
                            patryksroczynski13@gmail.com
                        </a>
                    </h6>
                </div>

                <div hidden class="rivet tenor-gif-embed" data-postid="21329300" data-share-method="host" data-aspect-ratio="1.78771" data-width="100%">
                    <a href="https://tenor.com/view/rivet-ratchet-and-clank-rift-apart-new-lombax-lombax-wink-gif-21329300">
                        Rivet Ratchet And Clank Rift Apart GIF
                    </a>from
                    <a href="https://tenor.com/search/rivet-gifs">
                        Rivet GIFs
                    </a>
                </div>

                <ul class="list-group list-group-flush bg-secondary">
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('games.create') }}" class="text-white">
                            🎮 Add Game 🎮
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('races.create') }}" class="text-white">
                            👽 Add Race 👽
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('galaxies.create') }}" class="text-white">
                            🌌 Add Galaxy 🌌
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('planets.create') }}" class="text-white">
                            🌍 Add Planet 🌍
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="" class="text-white">
                            🔫 Add Weapon 🔫
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('gadgets.create') }}" class="text-white">
                            🧰 Add Gadget 🧰
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="" class="text-white">
                            👾 Add Enemy 👾
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('organizations.create') }}" class="text-white">
                            🏭 Add Organization 🏭
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('vehicles.create') }}" class="text-white">
                            🚀 Add Vehicles 🚀
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('skillpoints.create') }}" class="text-white">
                            🏆 Add Skill Point 🏆
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    <script>
        document.querySelector('.secret').addEventListener('click', () => {
           document.querySelector('.rivet').hidden = false
        });
        document.querySelector('.rivet').addEventListener('mouseover', () => {
            document.querySelector('.rivet').hidden = true
        });
    </script>
@endsection
