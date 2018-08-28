<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>
            <?= $title ?>
        </title>

        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">

        <!-- Compiled and minified MAterialize CSS -->
        <link rel="stylesheet" href="public/css/materialize/materializesansmodal.min.css">

        <!--     Css     -->
        <link rel="stylesheet" href="public/css/style.css" />

        <!--Icons-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
        <!-- Icons-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!--TyniMce-->
        <script src="public/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea', language: "fr_FR"});</script>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    </head>

    <body class="grey lighten-4">
        <div class="">
            <div class="row bandeau">
                <p class="bandeau card center s12">Espace d' administration du Blog</p>
            </div>

            <header>
                <nav class="navbar-fixed blue-grey darken-4">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="?action=manageBlog">Tableau de bord</a></li>
                        <li><a href="?action=manageArticles">Gestion des articles</a></li>
                        <li><a href="?action=manageComs">Gestion des commentaires</a></li>
                        <li><a href="?action=listPosts" target="_blank">Retour au site</a></li>

                    </ul>


                    <a href="#" data-target="slide-out" class="left button-collapse sidenav-trigger"><i class="material-icons">menu</i></a>


                    <ul class="right">
                        <li class="left"><a href="?action=decoAdmin"><?= ucfirst($_SESSION['user']->logName()) ?> (se déconnecter)</a></li>
                    </ul>
                </nav>
                <ul id="slide-out" class="side-nav">
                    <li><a href="?action=manageBlog">Tableau de bord</a></li>
                    <li><a href="?action=manageArticles">Gestion des articles</a></li>
                    <li><a href="?action=manageComs">Gestion des commentaires</a></li>
                    <li><a href="?action=listPosts" target="_blank">Retour au site</a></li>
                </ul>
            </header>
        </div>


        <?= $content ?>







        <footer class="blue-grey darken-4">

        </footer>

        <!--</script>-->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Compiled and minified JavaScript Materialize-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        <script src="public/js/script.js"></script>
    </body>

</html>
