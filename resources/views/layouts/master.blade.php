<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Maison</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
           @include('partials.menu')
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        @yield('content')
    </div>
    </div>
    
</div>


@section('scripts')
<script src="{{asset('js/app.js')}}"></script>


@show
<footer>
    &copy 2019 - produits fabriqués avec soins dans nos usines situées en France depuis 45 ans - La Maison
</footer>
</body>
</html>
