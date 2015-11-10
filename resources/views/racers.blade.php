<!DOCTYPE html>
<html>
    <head>
        <title>Racers</title>

        <link href="https://fonts.googleapis.com/css?family=Play:400,700|Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="/">home</a>
                <a href="/races">races</a>
                <a href="/racers">racers</a>
            </nav>
        </header>
        <div class="pattern"></div>
        <div class="container">
            <div class="title">Racers</div>
            <div class="content">
                <h1>List of Racers:</h1>
                <div class="wrap">
                    @foreach($racers as $racer)
                        <li><form action="/racers/{{ $racer['racerId'] }}/delete" method="GET">{{ csrf_field() }}
                        <button class="remove" data="{{ $racer['racerId'] }}">x</button>
                        <a href="/racers/{{$racer['racerId']}}">{{$racer["name"]}}</a></form></li>
                    @endforeach
                </div>
                <a href="/addracer"><button class="add">+ Add</button></a>
            </div>
        </div>
    </body>
</html>