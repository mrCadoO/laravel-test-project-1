<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/ckeditor/ckeditor.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}" ></script>

</head>
<body>

<header id="header_wrapper">
    @yield('header')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if(count($errors) > 0 )
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</header>
    @yield('content')
</body>
</html>
