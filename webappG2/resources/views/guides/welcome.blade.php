<!DOCTYPE html>

<!-- Blade is Laravel's template engine -->
<!-- Laravel will take the blade file and compile it down to vanilla PHP -->
<html>

<head>
    <title></title>
</head>

<body>
<ul>
    <h1> Hello </h1>
    @foreach ($guides as $guide)
        <li> {{ $guide->first_name }} </li>
    @endforeach
</ul>
</body>

</html>