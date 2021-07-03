<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>airshipt</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            img {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 500px;
                height: 500px;
                margin-top: -250px; /* Half the height */
                margin-left: -250px; /* Half the width */
            }
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #e53f29;
            }
        </style>
    </head>
    <body class="antialiased">
    <img src="{{ asset('images/pp.jpeg') }}" alt="">
    </body>
</html>
