<?php $this->title = 'Mon blog - NOUVEL ARTICLE'; ?>

<div class="container">
   <div class="row">
           <h1 class="card light-blue-text text-lighten-1 z-depth-2">NOUVEL ARTICLE</h1>

   </div>

    <div class="row card-panel ">
        <form action="?action=createArticle" method="post" class="col s12 m10 offset-m1">

            <div class="row">
                <input type="text" name="titre" placeholder="Titre de l'article" class="col s12 m6">
            </div>
            <div class="row">
                <textarea name="contenu" id="inputArticle" cols="30" rows="10"><br>Votre article ici</textarea>
            </div>
            <div class="row">
                <input type="submit" class="btn blue-grey lighten-3">
            </div>

        </form>
    </div>

    <div class="row">
        <div class="center">
            <p class="btn blue-grey lighten-4 btn-large"><a href="?action=manageBlog" class="white-text">Retour au Tableau de bord</a></p>
        </div>
    </div>
</div>
