<!DOCTYPE HTML>
<html>

<head>
    <title>Cuello fotografias</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="css/assets/css/noscript.css" />
    </noscript>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/assets/css/custom.css" />

    
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <x-header :user="$user" />
    <!-- Nav -->
    <x-nav />

    {{ $slot }}


    <!-- Copyright -->
    <div id="copyright">
        <ul>
            <li>&copy; Aixa Desarrollo </li>
            <li>  <a href="#"></a></li>
        </ul>
    </div>


    <!-- Scripts -->
    <script src="js/assets/js/jquery.min.js"></script>
    <script src="js/assets/js/jquery.scrollex.min.js"></script>
    <script src="js/assets/js/jquery.scrolly.min.js"></script>
    <script src="js/assets/js/browser.min.js"></script>
    <script src="js/assets/js/breakpoints.min.js"></script>
    <script src="js/assets/js/util.js"></script>
    <script src="js/assets/js/main.js"></script>

    <!-- Bootstrap JS -->

</body>

</html>
