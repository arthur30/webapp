@extends('layouts.master')

<!DOCTYPE html>

<!-- Blade is Laravel's template engine -->
<!-- Laravel will take the blade file and compile it down to vanilla PHP -->
<html>

<head>
    <title></title>
</head>

<body>
<ul>
    <h1> Hello {{ $guide->full_name }} </h1>
</ul>
</body>

</html>