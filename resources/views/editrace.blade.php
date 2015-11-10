<!DOCTYPE html>
<html>
    <head>
        <title>Edit Race</title>

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
            <div class="title">Edit Race</div>
            <div class="content">
                <h1>Edit {{ $race['raceName'] }}:</h1>
                <div class="form">
                    <form method="POST" action="">
                    {!!csrf_field() !!}
                        <div>
                            <label>Name: 
                                <input type="text" name="raceName" value="{{ $race['raceName'] }}">
                            </label><br>
                            <label>Length: 
                                <input type="text" name="length" value="{{ $race['length'] }}">
                            </label><br>
                            <label>Location: 
                                <input type="text" name="location" value="{{ $race['location'] }}">
                            </label><br>
                            <label>Start Date: 
                                <input type="date" name="startDate" value="{{ $race['startDate'] }}">
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