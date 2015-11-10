<!DOCTYPE html>
<html>
    <head>
        <title>Race Details</title>

        <link href="https://fonts.googleapis.com/css?family=Play:400,700|Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../stylesheet.css">
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
            <div class="title">Race Details</div>
            <div class="content">
                <h1>{{ $race['raceName'] }}</h1>
                <p>{{ $race['startDate'] }}</p>
                <p>{{ $race['location'] }}</p>
                <p>{{ $race['length'] }}</p>
                <div class="view"><a href ="/races/{{$raceId}}/theracers">View Racers</a></div>
                <a href="/races/{{$race['raceId']}}/editrace"><button class="add">Edit Race</button></a>
                <div class="cancel">
                    <a href="/races">Go Back</a>
                </div>
            </div>
        </div>
    </body>
</html>