<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="container">

    <h2 class="card center valign-wrapper red-text"><?= $errorMessage ?></h2>

    <div class="center">
        <p class="btn blue-grey lighten-4 btn-large pulse"><a href="?action=manageBlog" class="white-text">Retour au tabeau de bord</a></p>
    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('../view/backend/template.php'); ?>
