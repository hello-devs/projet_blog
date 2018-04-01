<?php $title = 'Admin du Blog'; ?>


<?php ob_start(); ?>

<div id="moderation" class="section">
    <div class="row bandeau">
        <p class="bandeau card center s12">Modération des commentaires</p>
    </div>
    <div id="tuiles" class="container">

        <a href="?action=manageComs#signall">
            <div class="tuile white-text card  red darken-4 hoverable valign-wrapper">

                <h5>SIGNAL&Eacute;:</h5>
                <h3>_<?= $commentsSignalCount ?>_</h3>
            </div>
        </a>

        <a href="?action=manageComs#avalid">
            <div class="tuile white-text card amber darken-4 hoverable valign-wrapper">
                <h5>&Agrave; VALIDER:</h5>
                <h3>_<?= $commentsToValidCount ?>_</h3>
            </div>
        </a>

        <a href="?action=manageComs#valid">
            <div class="tuile white-text card teal accent-3 hoverable valign-wrapper">
                <h5>VALID&Eacute;:</h5>
                <h3>_<?= $commentsValidCount ?>_</h3>
            </div>
        </a>

    </div>

</div>

<div class="divider"></div>
<!--------------------------------------------------------------------------------->

<div id="articlesList" class="section">
    <div class="row bandeau">
        <p class="bandeau card center s12">Mes articles</p>
    </div>

    <div class="container">
        <div class="card">
            <a href="?action=createArticle">
                <p class="center">... Ajouter un article ...</p>
            </a>
        </div>
        <table class="card bordered highlight responsive-table">
            <thead>
                <tr>
                    <th>Titre de l' article</th>
                    <th>Résumé</th>
                    <th>Date de rédaction</th>
                    <th>&Eacute;tat</th>
                    <th>&Eacute;diter</th>
                </tr>
            </thead>

            <tbody>

               <?php foreach($posts as $post): ?>

                        <tr>
                            <td><?= $post['title'] ?></td>
                            <td><?= substr($post['content'], 0, 100); ?></td>
                            <td><?= $post['date_creation_fr'] ?></td>
                            <td><?= $post['etat'] ?></td>
                            <td class="center"><a href="?action=manageArticle&id=<?= $post['id'] ?>"><i class="far fa-edit fa-2x"></i></a></td>
                        </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="card">
            <a href="?action=createArticle">
                <p class="center">... Ajouter un article ...</p>
            </a>
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>




<?php require('../view/backend/template.php') ?>