<!DOCTYPE html>
<html>
    <head>
        <title>Races</title>

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
            <div class="title">Races</div>
            <div class="content">
                <h1>List of Races:</h1>
                <div class="wrap">
                    @foreach($races as $race)
                        <li><button class="remove" data="{{ $race['raceId'] }}">x</button><a href="/races/{{$race['raceId']}}">{{$race["raceName"]}}</a></li>
                    @endforeach
                </div>
                <a href="/addrace"><button class="add">+ Add</button></a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script>
            $(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    }
                })

                var base_url = 'http://localhost:8000/';

                $("button.remove").on("click", function(e){

                    var raceId = $(this).attr("data");

                    var current = $(this).parent();

                    $.post( base_url + "/api/removeRace", {raceId: raceId}, function(res) {
                        current.remove();
                    });

                });

            });
        </script>
    </body>
</html>