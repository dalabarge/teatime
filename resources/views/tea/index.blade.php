<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tea Time</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form action="{{ route('tea.create') }}" method="GET" class="container text-center">
            <h1>Tea Time</h1>
            
            <blockquote>
                <q class="lead">Come, let us have some tea and continue to talk about happy things.</q>
                <cite>– Chaim Potok</cite>
            </blockquote>

            <div class="questions-group">
                <h2>What kind of tea do you like?</h2>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="type" value="black" autocomplete="off"> Black
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="type" value="green" autocomplete="off"> Green
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="type" value="herbal" autocomplete="off"> Herbal
                    </label>
                </div>
            </div>

            <div class="questions-group">
                <h2>How much time do you have?</h2>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="rush" value="-120" autocomplete="off"> In A Hurry
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="rush" value="0" autocomplete="off"> Give Me a Brew
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="rush" value="+180" autocomplete="off"> I Can Wait
                    </label>
                </div>
            </div>

            <div class="questions-group">
                <h2>How much caffeine do you want?</h2>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="caffeine" value="100" autocomplete="off"> Morning Fix
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="caffeine" value="30" autocomplete="off"> Regular Amount
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="caffeine" value="0" autocomplete="off"> No Caffeine
                    </label>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-lg btn-primary">See Recommendation <i class="fa fa-fw fa-chevron-right"></i></button>

        </form>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
