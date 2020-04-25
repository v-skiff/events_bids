<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active offset-2">
                <a class="nav-link" href="{{ route('task_1') }}">Task 1</a>
            </li>
            <li class="nav-item active offset-2">
                <a class="nav-link" href="{{ route('task_2') }}">Task 2-4</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @yield('content')

</div>

{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/prism.js') }}"></script>
</body>
</html>
