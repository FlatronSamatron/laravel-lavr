@props([
        'title',
        'header' => null,
        'route' => 'car.index'
])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>

<header>
    <div class="container border-bottom pb-2">
        <a href="{{route($route)}}">Logo</a>
    </div>
</header>





<div class="container p-2">
    <x-message></x-message>
    <h1>{{$header ?? $title}}</h1>
    {{$slot}}
</div>

<footer>
    <div class="container border-top pt-2">
        Footer
    </div>
</footer>
</body>
</html>

