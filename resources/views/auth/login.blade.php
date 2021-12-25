@extends('layouts.app')

@section('loginform')
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="form-inline">
                @csrf

                <label for="email">{{ __('E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

            </form>
        </div>
    </div>
@endsection
