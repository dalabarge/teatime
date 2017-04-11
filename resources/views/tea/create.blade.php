<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tea Time – Recommendation</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form action="{{ route('tea.store') }}" method="POST" class="container text-center">
            <h1>Tea Time</h1>
            
            {{ csrf_field() }}

            @if( $errors->count() )
                <div class="alert alert-warning">
                    <ul class="text-left" style="margin:0;">
                        @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($recommendation as $key => $value)
                <input type="hidden" name="{{$key}}" value="{{$value}}" />
            @endforeach

            <h2>{{ array_get($recommendation, 'name', 'Hot Tea') }}</h2>
            <div class="row">
                <div class="col">
                    <dl class="lead">
                        <dt>Type</dt>
                        <dd>{{ array_get($recommendation, 'type', 'black') }}</dd>
                    </dl>
                </div>
                <div class="col">
                    <dl class="lead">
                        <dt>Caffeine</dt>
                        <dd>{{ array_get($recommendation, 'caffeine', 30) }} mg</dd>
                    </dl>
                </div>
                <div class="col">
                    <dl class="lead">
                        <dt>Brew Time</dt>
                        <dd>{{ array_get($recommendation, 'time', 0) }} seconds</dd>
                    </dl>
                </div>
            </div>
            
            <a href="{{ route('tea.index') }}" class="btn btn-secondary"><i class="fa fa-fw fa-chevron-left"></i> Back</a>
            <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-fw fa-coffee"></i> Brew It</button>

        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
