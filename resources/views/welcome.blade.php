<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet">
        <title>Refericon</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
