<!DOCTYPE HTML>
<html>

<head>
    <title>Cuello fotografias</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('css/assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/assets/css/noscript.css') }}" />
    </noscript>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/assets/css/custom.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="is-preload">

    <div id="wrapper" class="fade-in">
        <!-- Wrapper -->
        <x-header :user="$user" />
        <!-- Nav -->
        <x-nav />

        {{ $slot }}


        <!-- Copyright -->
        <div id="copyright">
            <ul>
                <li>&copy; Aixa Desarrollo </li>
                <li> <a href="#"></a></li>
            </ul>
        </div>



        <!-- Scripts -->
        <script src="{{ asset('js/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ asset('js/assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ asset('js/assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('js/assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('js/assets/js/util.js') }}"></script>
        <script src="{{ asset('js/assets/js/main.js') }}"></script>
    </div>

</body>

</html>
