<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<div class="container">

<div class="row">
    <form action="post" class="card-panel">
     <input type="text" name="titre" placeholder="Titre de l'article">
     <br>
      <textarea name="article" id="inputArticle" cols="30" rows="10">Votre article ici</textarea>
      <br>
       <input type="submit">

    </form>


    <div class="center">
        <p class="btn blue-grey lighten-4 btn-large"><a href="?action=manageBlog" class="white-text">Retour au Tableau de bord</a></p>
    </div>
</div>

</div>




<?php $content = ob_get_clean(); ?>

<?php require('../view/backend/template.php'); ?>
