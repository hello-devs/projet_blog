<?php $title = 'Mon blog - Contact'; ?>

<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <form class="col s12 m10 offset-m1  card-panel" action="#">
            <div class="row">
                <div class=" col s6">
                    <label for="first_name">Prénom</label>

                    <input id="first_name" name="first_name" type="text" class="validate" required>
                </div>
                <div class="col s6">
                    <label for="last_name">Nom</label>

                    <input id="last_name" name="last_name" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="textarea1">Message</label>
                    <textarea id="textarea1" name="message" class="materialize-textarea"></textarea>

                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="validate">

                </div>
            </div>
            <div class="row">
                <div class="col s12 m3 offset-m2">
                    <input class="btn blue-grey lighten-1" type="submit" value="Envoyer">
                </div>
                <div class="col s12 m3 offset-m3">
                    <input class="btn blue-grey lighten-1" type="reset" value="Effacer">
                </div>
            </div>

        </form>
    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
