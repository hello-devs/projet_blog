<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>
            <?= $title ?>
        </title>
        
        <!--    Pas d'indexation jusqu'a validation client-->
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">


        <!-- Compiled and minified MAterialize CSS -->
        <link rel="stylesheet" href="public/css/materialize/materializesansmodal.min.css">

        <!-- CSS Perso-->
        <link rel="stylesheet" href="public/css/style.css" />

        <!-- Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!--Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

        <!-- Encodage-->
        <meta charset="utf-8" />

        <!-- Echelle Mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="grey lighten-3">

        <header class="">

            <nav class="navbar-fixed blue-grey darken-4">

                <a id="logo" href="index.php" class="left">Jean Forteroche</a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="?action=bio">Biographie</a></li>
                    <li><a href="?action=contact">Contact</a></li>
                </ul>
                <a href="#" data-target="slide-out" class="right button-collapse sidenav-trigger"><i class="material-icons">menu</i></a>


            </nav>
            <ul id="slide-out" class="side-nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="?action=bio">Biographie</a></li>
                <li><a href="?action=contact">Contact</a></li>
            </ul>


        </header>

        <h1 class="titreBlog  light-blue-text text-lighten-5 z-depth-2">Billet simple pour l'Alaska</h1>
        <section id="content">
            <?= $content ?>
        </section>
        <footer class="blue-grey darken-4">

            <div class="container">
                <p><span class="right card grey"><a class="white-text" href="?action=adminConnect">ADMINISTRATION </a></span> </p>
            </div>
        </footer>

        <!--<script type="text/javascript" src="../js/ajax.js"></script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript Materialize-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="public/js/script.js"></script>
    </body>

</html>
