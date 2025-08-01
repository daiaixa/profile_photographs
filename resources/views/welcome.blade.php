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
    <div id="wrapper" class="fade-in">


        <!-- Header -->
        <header id="header">
            <a href="index.html" class="logo">{{ $user->name }}</a>
            <p>Fotografo</p>
        </header>

        <!-- Nav -->
        <nav id="nav">
            <ul class="links">
                <li class="active"><a href="index.html">Acerca de mi</a></li>
                <li><a href="albumes.html">Álbumes Fotograficos</a></li>
                <li><a href="contacto.html">Contactame</a></li>
            </ul>
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <!-- FOTOGRAFIAS -->
            <div class="post featured">
                <header class="major">
                    <h2 class="about">Acerca de mi</h2>
                    <p>{{ $user->about_me }}</p>
                </header>
            </div>

            <div class="content-posts">
                <div class="posts">
                    @foreach ($photos as $photo)
                        <div class="content-photo">
                            <img src="{{ $photo->image_url }}" alt="foto" class="photo">
                        </div>
                    @endforeach
                </div>
            </div>


			<footer>
				<div class="pagination">
					{{$photos->links()}}
				</div>
			</footer>

            <!-- Footer -->
            <footer>
                <div class="pagination">
                    <!--<a href="#" class="previous">Prev</a>-->
                    <a href="#" class="page active">1</a>
                    <a href="#" class="page">2</a>
                    <a href="#" class="page">3</a>
                    <span class="extra">&hellip;</span>
                    <a href="#" class="page">8</a>
                    <a href="#" class="page">9</a>
                    <a href="#" class="page">10</a>
                    <a href="#" class="next">Next</a>
                </div>
            </footer>

        </div>

        <!-- Footer -->
        <footer id="footer">

        </footer>

        <!-- Copyright -->
        <div id="copyright">
            <ul>
                <li>&copy; Untitled</li>
                <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/assets/js/jquery.min.js"></script>
    <script src="js/assets/js/jquery.scrollex.min.js"></script>
    <script src="js/assets/js/jquery.scrolly.min.js"></script>
    <script src="js/assets/js/browser.min.js"></script>
    <script src="js/assets/js/breakpoints.min.js"></script>
    <script src="js/assets/js/util.js"></script>
    <script src="js/assets/js/main.js"></script>

</body>

</html>
