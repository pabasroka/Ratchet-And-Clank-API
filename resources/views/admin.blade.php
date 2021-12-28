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
                        <a href="{{ route('races.edit') }}" class="text-white">
                            👽 Update Race 👽
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">
                        <a href="{{ route('galaxies.edit') }}" class="text-white">
                            🌌 Add Galaxy 🌌
                        </a>
                    </li>
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="{{ route('planets.edit') }}" class="text-white">--}}
{{--                            🌍 Add Planet 🌍--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            🔫 Add Weapon 🔫--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            🧰 Add Gadget 🧰--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            👾 Add Enemy 👾--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            🏭 Add Organization 🏭--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            🚀 Add Vehicles 🚀--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item bg-secondary">--}}
{{--                        <a href="" class="text-white">--}}
{{--                            🏆 Add Skill Point 🏆--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
@endsection
