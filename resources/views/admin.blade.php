@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <ul class="list-group list-group-flush">
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('games.edit') }}" class="text-white">
                            🎮 Update Game 🎮
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('characters.edit') }}" class="text-white">
                            🧑 Update Character 🧑
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('races.edit') }}" class="text-white">
                            👽 Update Race 👽
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('galaxies.edit') }}" class="text-white">
                            🌌 Update Galaxy 🌌
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('planets.edit') }}" class="text-white">
                            🌍 Update Planet 🌍
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('weapons.edit') }}" class="text-white">
                            🔫 Update Weapon 🔫
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('gadgets.edit') }}" class="text-white">
                            🧰 Update Gadget 🧰
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('organizations.edit') }}" class="text-white">
                            🏭 Update Organization 🏭
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('vehicles.edit') }}" class="text-white">
                            🚀 Update Vehicles 🚀
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('skillpoints.edit') }}" class="text-white">
                            🏆 Update Skill Point 🏆
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
