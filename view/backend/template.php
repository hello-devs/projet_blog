<!DOCTYPE html>
<html lang="fr">

<head>
    <title>
        <?= $title ?>
    </title>


    <!-- Compiled and minified MAterialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--     Css     -->
    <link rel="stylesheet" type="text/css" href="../public/css/style.css" />

    <!--Icons-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

    <!--TyniMce-->
    <script src="../../public/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <meta charset="utf-8" />
</head>

<body class="grey lighten-2">
    <div class="container-fluid">
        <div class="row bandeau">
            <p class="bandeau card center s12">Espace d' administration du Blog</p>
        </div>

        <div class="row">
            <header class="s12">
                <nav class="navbar-fixed blue-grey lighten-1">
                    <ul class="navbar-nav">
                        <li><a href="?action=manageBlog">Tableau de bord</a></li>
                        <li><a href="?action=manageArticles">Gestion des articles</a></li>
                        <li><a href="?action=manageComs">Gestion des commentaires</a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>

    <?= $content ?>







        <footer class="blue-grey lighten-1 z-depth-2">
            <div class="container">
                <div class="">
                    <p><span class=" ">copyright </span></p>
                </div>
            </div>

        </footer>

    <!--<script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src=""></script>-->
</body>

</html>
