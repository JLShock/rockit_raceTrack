<!DOCTYPE html>
<html>
    <head>
        <title>Racer Details</title>

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
            <div class="title">Racer Details</div>
            <div class="content">
                <h1>{{ $racer['name'] }}</h1>
                <p><span>Racer ID: </span>{{$racer['racerId']}}</p>
                <p><span>Age: </span>{{$racer['age']}}</p>
                <a href="/racers/{{$racer['racerId']}}/editracer"><button class="add">Edit Racer</button></a>
                <div class="cancel">
                    <a href="/racers">Go Back</a>
                </div>
            </div>
        </div>
    </body>
</html>