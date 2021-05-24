<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
        {{-- <link rel="stylesheet" href="{{ secure_asset('css/style.scss') }}"> --}}
        <base href="https://sofra-food.herokuapp.com/" target="_blank">
        <title>Sofra</title>
    </head>
    <body >
    <div id="app">
        <div>
            <application></application>
        </div>
    </div>
        <script src="{{ secure_asset('js/app.js') }}"></script>
        {{-- <script src="{{ secure_asset('js/main.js') }}"></script> --}}
    </body>
</html>
