<?php $this->title = 'Admin du Blog - Gestion Articles'; ?>

<?php ob_start(); ?>



    <div class="container">
       <div class="bandeau card">
            <a href="?action=createArticle">
                <p class="center">... Ajouter un article ...</p>
            </a>
       </div>
    </div>

    <div class="container-fluid row bandeau">
        <p class="bandeau card center s12">Mes Articles:</p>
    </div>


    <div class="container">
        <table class="card bordered highlight responsive-table">
            <thead>
                <tr><th> Titre</th>
                    <th>Date de rédaction</th>
                    <th>Aperçu</th>
                    <th class="center-cell">&Eacute;tat</th>
                    <th class="center-cell">&Eacute;diter</th>
                    <th class="center-cell">Supprimer</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($posts as $post): ?>

                <tr>
                   <td>
                       <?= $post['title'] ?>
                   </td>
                    <td>
                        <?= $post['date_creation_fr'] ?>
                    </td>

                    <td>
                        <?= substr($post['content'], 0, 200) ?>
                    </td>

                    <td class="center-cell">
                        <?= ucfirst($post['etat']) ?>
                    </td>

                    <td>
                        <a href="?action=managePost&id=<?= $post['id'] ?>"><i class="far fa-edit fa-2x"></i></a>
                    </td>

                    <td class="center-cell">
                        <a href="?action=deletePost&id=<?= $post['id'] ?>"><i class="far fa-trash-alt fa-2x"></i></a>
                    </td>
                </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <div class="container">
       <div class="bandeau card">
            <a href="?action=createArticle">
                <p class="center">... Ajouter un article ...</p>
            </a>
       </div>
    </div>

