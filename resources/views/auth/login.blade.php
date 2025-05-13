@extends('layouts.app')

@section('content')
    <div>
        <h1>Login</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <input id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" autofocus>

                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input id="password" name="password" type="password" placeholder="Password">

                @error('password')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input id="remember" name="remember" type="checkbox">
                <label for="remember">Remember Me</label>
            </div>

            <div>
                <button>Login</button>
            </div>
        </form>

        <a href="{{ route('register') }}">Register</a>
    </div>
