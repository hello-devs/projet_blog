<?php $title = 'Mon blog- Connexion'; ?>

<?php ob_start(); ?>

<div class="container">
    <?php if(isset($errorMessage)):?>
    <h2 class="card center valign-wrapper red-text">
        <?= $errorMessage ?>
    </h2>
    <?php endif; ?>



    <div class="row">
        <form class="col s12 m6 offset-m3  card-panel" action="?action=verifUserAuth" method="post">
            <div class="row s12 m10 offset-m1">
                <h6 class="center">Connexion à l'espace d'administration</h6>
            </div>
            <div class="row">
                <div class="input-field col s12 m10 offset-m1">
                    <!--<i class="material-icons">account_circle</i>-->
                    <input id="logName" name="logName" type="text" class="active validate"  required>
                    <label for="logName">Identifiant</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m10 offset-m1">
                    <!--<i class="material-icons">vpn_key</i>-->
                    <input id="pwd" name="pwd" type="password" class="validate"  required>
                    <label for="pwd">Mot de passe</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m3 offset-m1">
                    <input class="btn blue-grey lighten-1" type="submit" value="Envoyer">
                </div>
                <div class="col s12 m3 offset-m3">
                    <input class="btn blue-grey lighten-1" type="reset" value="Effacer">
                </div>
            </div>


        </form>
    </div>










    <div class="center">
        <p class="btn blue-grey lighten-4 btn-large"><a href="index.php" class="white-text">Retour à l'ccueil</a></p>
    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
