<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tea Time – {{ $tea->name }}</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container text-center">
            <h1>Tea Time</h1>

            @if( $tea->is_ready )
                <div class="brewed">
                    <h2>Your {{ $tea->name }} Is Ready</h2>
                    <p>Enjoy Each Sip!</p>
                </div>
            @else
                <div class="brewing">
                    <h2>Your {{ $tea->name }} Is Brewing</h2>
                    <p>
                        Ready in 
                        <time datetime="{{ $tea->drinkable_at->format('Y-m-d H:i:s') }}">
                            {{ $tea->time_left_brewing }}
                        </time>
                    </p>
                </div>
            @endif

        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
