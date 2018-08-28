<?php $this->title = 'Mon Blog - '.$post['title']; ?>


<div class="row">
    <article class="col s12 m10 offset-m1 l8 offset-l2 card-panel z-depth-2">
        <span class="card-title">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <em class="date">le <?= $post['creation_date_fr'] ?></em>
        </span>
        <hr>
        <br>
        <p>
            <?= nl2br($post['content']) ?>
        </p>
    </article>
</div>

<div class="center">
    <p class="btn white"><a href="index.php" class="light-blue-text text-lighten-2">Retour à la liste des billets</a></p>
</div>

<div>

    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2 card-panel">

            <h4>Ajouter un commentaire</h4>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" required/>
                </div>
                <div>
                    <label for="comment">Commentaire</label>
                    <textarea id="comment" name="comment" required></textarea>
                </div>
                <div>
                    <input class="btn blue-grey lighten-3" type="submit" />
                </div>
            </form>

        </div>
    </div>

    <h5 class="blue-grey lighten-5 center">Commentaires</h5>

    <div class="row">
    <?php
        while ($comment = $comments->fetch())
        {
        ?>
    <div class="col s12 m10 offset-m1 l8 offset-l2 card-panel">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le
            <?= $comment['comment_date_fr'] ?>
        </p>
        <p>
            <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        </p>

        <p class="btn white"><a href="?action=signalCom&id=<?= $comment['id'] ?>&postId=<?= $post['id'] ?>" class="light-blue-text text-lighten-2">Signaler ce commentaire</a></p>
    </div>
        <?php
        }
        $comments->closeCursor();
        ?>
    </div>


</div>
