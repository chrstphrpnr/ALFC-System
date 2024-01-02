

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfc Insurance Agency Corporation.</title>
    <!-- {{-- <link src="{{ asset('assets/bootstrap-v4.0.0.min.css') }}"> --}} -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-v4.0.0.min.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>


    @include('Partials.base-nav')

    <div>
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery/google-jquery-v3.5.1.min.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
