<?php $this->title = 'Admin du Blog - Commentaires'; ?>


<div id="signall">
    <div class="row bandeau">
        <p class="bandeau card center s12">Commentaire(s) signalé(s):</p>
    </div>
    <div class="container">
        <table class="card bordered highlight responsive-table">
            <thead>
                <tr>
                    <th>Date de rédaction</th>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th class="center-cell">Valider</th>
                    <th class="center-cell">Supprimer</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($commentsSignal as $commentaire): ?>

                <tr>
                    <td>
                        <?= $commentaire['comment_date_fr'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['author']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['comment']) ?>
                    </td>

                    <td class="center-cell">
                        <a href="?action=validCom&id=<?= $commentaire['id'] ?>"><i class="fas fa-check fa-2x"></i></a>
                    </td>

                    <td class="center-cell">
                        <a class="suppBdd" href="?action=deleteCom&id=<?= $commentaire['id'] ?>"><i class="far fa-trash-alt fa-2x"></i></a>
                    </td>
                </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>



<div id="avalid">
    <div class="row bandeau">
        <p class="bandeau card center s12">Commentaire(s) à valider:</p>
    </div>
    <div class="container">
        <table class="card bordered highlight responsive-table">
            <thead>
                <tr>
                    <th>Date de rédaction</th>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th class="center-cell">Valider</th>
                    <th class="center-cell">Supprimer</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($commentsAvalid as $commentaire): ?>

                <tr>
                    <td>
                        <?= $commentaire['comment_date_fr'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['author']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['comment']) ?>
                    </td>

                    <td class="center-cell">
                        <a href="?action=validCom&id=<?= $commentaire['id'] ?>"><i class="fas fa-check fa-2x"></i></a>
                    </td>

                    <td class="center-cell">
                        <a class="suppBdd" href="?action=deleteCom&id=<?= $commentaire['id'] ?>"><i class="far fa-trash-alt fa-2x"></i></a>
                    </td>
                </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>



<div id="valid">
    <div class="row bandeau">
        <p class="bandeau card center s12">Commentaire(s) validé(s):</p>
    </div>
    <div class="container">
        <table class="card bordered highlight responsive-table">
            <thead>
                <tr>
                    <th>Date de rédaction</th>
                    <th>Auteur</th>
                    <th>Commentaire</th>
                    <th class="center-cell">Supprimer</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($commentsValid as $commentaire): ?>

                <tr>
                    <td>
                        <?= $commentaire['comment_date_fr'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['author']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($commentaire['comment']) ?>
                    </td>

                    <td class="center-cell">
                        <a class="suppBdd" href="?action=deleteCom&id=<?= $commentaire['id'] ?>"><i class="far fa-trash-alt fa-2x center-i"></i></a>
                    </td>
                </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>
