<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fonimage</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


    <!-- Fonts -->
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css') !!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900') !!}

    {{-- <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>--}}

            <!-- Styles -->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css') !!}
    {!! Html::style('css/style.css') !!}

</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                @if(isset($images))
                    {!! Form::model(Request::only(['search']),['route' => 'gallery', 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'form']) !!}
                    <div class="form-group">
                        {!! Form::text('search',null,['class' => 'form-control', 'placeholder' => 'Descrizione ...']) !!}
                    </div>
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    {!! Form::close() !!}
                @else
                    <li><a href="{{ route('gallery') }}">Catalogo</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">

    @yield('content')

</div>


<!-- JavaScripts -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') !!}
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
{!! Html::script('https://code.jquery.com/ui/1.11.2/jquery-ui.js') !!}

@yield('scripts')

</body>
</html>
