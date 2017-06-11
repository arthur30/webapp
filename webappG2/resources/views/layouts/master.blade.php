<!DOCTYPE html>

<html>

<head>
    <title> GoLocal </title>
</head>

<body>
    @include('layouts.scripts')
    <!-- Some other HTML -->
        @yield('content') <!-- Example: content from the home page -->
    @include('layouts.footer')
</body>

</html>