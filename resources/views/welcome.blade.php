@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="p-5 text-center">
                    <h1 class="mb-3">Add Data Request To API</h1>
                    <h3 class="mb-3">The Data Will Be Available After Approval By The Administrator</h3>
                    <h6 class="mb-3">Have Any Question? Ask Me:</h6>
                    <h6 class="mb-3">
                        <a href="mailto:patryksroczynski13@gmail.com">
                            patryksroczynski13@gmail.com
                        </a>
                    </h6>
                </div>

                <ul class="list-group list-group-flush">
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('games.create') }}">
                            🎮 Add Game 🎮
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('races.create') }}">
                            👽 Add Race 👽
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('galaxies.create') }}">
                            🌌 Add Galaxy 🌌
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('planets.create') }}">
                            🌍 Add Planet 🌍
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            🔫 Add Weapon 🔫
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            🧰 Add Gadget 🧰
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            👾 Add Enemy 👾
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            🏭 Add Organization 🏭
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            🚀 Add Vehicles 🚀
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="">
                            🏆 Add Skill Point 🏆
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
