<?php $title = 'Mon blog - Accueil'; ?>

<?php ob_start(); ?>

<p class="card center">Derniers billets du blog :</p>
<div class="container">
<div class="row">

<?php
while ($post = $posts->fetch())
{
?>
    <article class="col s12 m4">

        <div class="card-panel z-depth-2 hoverable articleCards">

        <a href="index.php?action=post&amp;id=<?= $post['id'] ?>">
            <div class="apercuArticle">
                <div class="card-title black-text">
                    <?= htmlspecialchars($post['title']) ?>
                    <em class="date"><br> le <?= $post['date_creation_fr'] ?></em>
                </div>
                <hr class="">


                <p class="black-text">
                    <?= substr(nl2br($post['content']),0,200) ?>
                    <br />

                </p>
            </div>
            <div>
                   <em class="light-blue-text text-lighten-2">En savoir plus...</em>
            </div>

            <hr>

            <div>
                <p class="nbrComs"><?= $this->commentManager->getCount('post_id',$post['id']) ?> commentaire(s)</p>
            </div>
        </a>

        </div>

    </article>
<?php
}
$posts->closeCursor();
?>

</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>


