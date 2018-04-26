<!DOCTYPE html>
<html lang="fr">

<head>
    <title>
        <?= $title ?>
    </title>


    <!-- Compiled and minified MAterialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified JavaScript Materialize-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kalam|Montez" rel="stylesheet">

    <meta charset="utf-8" />
</head>

<body class="grey lighten-5">

    <div class="row">
        <header class="">

            <nav class="navbar-fixed blue-grey lighten-1">
                <div>
                    <a href="index.php">
                        <p id="logo" class="left">Jean Forteroche</p>
                    </a>
                </div>

                <ul class="navbar-nav right">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="?action=bio">Biographie</a></li>
                    <li><a href="?action=contact">Contact</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <h1 class="titreBlog  light-blue-text text-lighten-5 z-depth-2">Billet simple pour l'Alaska</h1>

    <?= $content ?>

        <footer class="blue-grey lighten-1 z-depth-2">

            <div class="container">
                <p><span class="right card grey"><a class="white-text" href="?action=adminConnect">ADMINISTRATION </a></span> </p>
            </div>
        </footer>

        <!--<script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src=""></script>-->
</body>

</html>
