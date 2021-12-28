@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <ul class="list-group list-group-flush">
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('games.edit') }}">
                            🎮 Update Game 🎮
                        </a>
                    </li>
                    <li style="text-align: center; font-size: 30px" class="list-group-item">
                        <a href="{{ route('races.edit') }}">
                            👽 Update Race 👽
                        </a>
                    </li>
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="{{ route('galaxies.edit') }}">--}}
{{--                            🌌 Add Galaxy 🌌--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="{{ route('planets.edit') }}">--}}
{{--                            🌍 Add Planet 🌍--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            🔫 Add Weapon 🔫--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            🧰 Add Gadget 🧰--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            👾 Add Enemy 👾--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            🏭 Add Organization 🏭--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            🚀 Add Vehicles 🚀--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li style="text-align: center; font-size: 30px" class="list-group-item">--}}
{{--                        <a href="">--}}
{{--                            🏆 Add Skill Point 🏆--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
@endsection
