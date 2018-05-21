<!DOCTYPE html>
<html lang="fr">

<head>
    <title>
        <?= $title ?>
    </title>


    <!-- Compiled and minified MAterialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- CSS Perso-->
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />

    <!-- Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kalam|Montez" rel="stylesheet">

    <!-- Encodage-->
    <meta charset="utf-8" />

    <!-- Echelle Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>

<body class="grey">

    <header class="">

        <nav class="navbar-fixed blue-grey lighten-1">

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
    <footer class="blue-grey lighten-1 z-depth-2">

        <div class="container">
            <p><span class="right card grey"><a class="white-text" href="?action=adminConnect">ADMINISTRATION </a></span> </p>
        </div>
    </footer>

        <!--<script type="text/javascript" src="../js/ajax.js"></script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript Materialize-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript" src="public/js/script.js"></script>
</body>

</html>
