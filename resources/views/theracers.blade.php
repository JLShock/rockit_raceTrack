<!DOCTYPE html>
<html>
    <head>
        <title>The Racers</title>

        <link href="https://fonts.googleapis.com/css?family=Play:400,700|Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../../stylesheet.css">
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
            <div class="title">The Racers</div>
            <div class="content">
                <h1>Who is Racing?</h1>
                @foreach($races as $race)
                    <p>{{$race['name']}}</p>
                @endforeach
                <div class="cancel">
                    <a href="/races/{{ $raceId }}">Go Back</a>
                </div>
            </div>
        </div>
    </body>
</html>