@extends('layouts.app')

@section('content')
    Welcome, {{ Auth::user()->name ?? 'Guest' }}
@endsection
