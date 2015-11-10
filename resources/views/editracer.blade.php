<!DOCTYPE html>
<html>
    <head>
        <title>Edit Racer</title>

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
            <div class="title">Edit Racer</div>
            <div class="content">
                <h1>Edit {{ $racer['name'] }}:</h1>
                <div class="form">
                    <form method="POST" action="">
                    {!! csrf_field() !!}
                        <div>
                            <label>Name: 
                                <input type="text" name="name" value="{{ $racer['name'] }}">
                            </label><br>
                            <label>Age: 
                                <input type="number" name="age" value="{{ $racer['age'] }}">
                            </label><br>
                            <button type="submit" name="update">Update</button><br>
                        </div>
                    </form>
                </div>
                <div class="cancel"><a href="/racers">Cancel</a></div>
            </div>
        </div>
    </body>
</html>