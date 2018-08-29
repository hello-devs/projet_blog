<?php $this->title = 'Mon blog - Accueil'; ?>

<h2 class="card center">Derniers épisodes du blog :</h2>
<div class="container">
<div class="row">

<?php
while ($post = $posts->fetch())
{
?>
    <article class="col s12 m6">

        <div class="card-panel z-depth-2 hoverable articleCards">

        <a href="index.php?action=post&amp;id=<?= $post['id'] ?>">
            <div class="apercuArticle">
                <div class="card-title black-text">
                    <h3><?= htmlspecialchars($post['title']) ?></h3>
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
                <p class="nbrComs"><?= $commentManager->getCount('post_id',$post['id']) ?> commentaire(s)</p>
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
