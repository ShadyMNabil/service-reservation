<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Service Reservation') }}</title>
</head>

<body>
    @include('layouts.navbar')

    @yield('content')

</body>

</html>
