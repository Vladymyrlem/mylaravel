<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Список постов</h1>

<ul>
    @if(count($companies)>0)
    @foreach($companies as $post)
    <li>
        <a href="{{ route('companies.show', ['slug' => $post->id]) }}">{{$post->title}}</a>
        <img src="{{$post->image}}" width="150" height="150" alt="">
    </li>
    @endforeach
    @else
        <h1>Companies not found</h1>
    @endif
</ul>

</body>
</html>
