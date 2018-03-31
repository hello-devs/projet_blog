<?php $title = 'Mon blog - Accueil'; ?>

<?php ob_start(); ?>

<p class="card center">Derniers billets du blog :</p>
<div class="container">
<div class="row center">

<?php
while ($data = $posts->fetch())
{
?>
    <article class="col s12 m3 card-panel z-depth-2 hoverable articleCards">

        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
            <div class="apercuArticle">
                <span class="card-title black-text">
                    <?= htmlspecialchars($data['title']) ?>
                    <em class="date"><br> le <?= $data['date_creation_fr'] ?></em>
                </span>


                <hr class="">

                <p class="black-text">
                    <?= substr(nl2br(htmlspecialchars($data['content'])),0,200) ?>
                    <br />
                    <em class="light-blue-text text-lighten-2">En savoir plus...</em>
                </p>
            </div>

                <hr>

            <div class="nbrCom">
                <p><?= $commentManager->getCount('post_id',$data['id']) ?> commentaire(s)</p>
            </div>
        </a>
    </article>
<?php
}
$posts->closeCursor();
?>

</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>


