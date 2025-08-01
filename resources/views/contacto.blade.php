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

        <footer id="footer">
            <section>
                <form method="post" action="#">
                    <div class="fields">
                        <div class="field">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" />
                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="3"></textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Send Message" /></li>
                    </ul>
                </form>
            </section>

            <section class="split contact">
                <section class="alt">
					<div class="content-items">
						<h3>{{$user->name}}  ~   Fotografo profesional </h3>
						<img src="{{$user->image_url}}" alt="" class="photo-profile">
					</div>
					
                </section>                
            </section>
        </footer>
	</div>
</body>
</html>
