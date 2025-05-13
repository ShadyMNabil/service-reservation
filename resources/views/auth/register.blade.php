@extends('layouts.app')

@section('content')
    <div>
        <h1>Register</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <input id="name" name="name" type="name" placeholder="Name" value="{{ old('name') }}" autofocus>

                @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">

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
                <input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Confirm Password">

                @error('password_confirmation')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button>Register</button>
            </div>
        </form>

        <a href="{{ route('login') }}">Login</a>
    </div>
