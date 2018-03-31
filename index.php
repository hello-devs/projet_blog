<?php

require('controler/frontEnd.php');

//autoload
spl_autoload_register('chargerClasse');


session_start();



try
{
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts')
        {
            listPosts();
        }
        elseif ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post($_GET['id']);
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else
                {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'signalCom')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0)
            {
                //
                signalComment($_GET['id'],$_GET['postId']);
            }
            else
            {
                // Autre exception
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'bio')
        {
            //
            bio();
        }
        elseif ($_GET['action'] == 'contact')
        {
            //
            contact();
        }
    }
    else
    {
        listPosts();
    }
}
catch(Exception $e)  // S'il y a eu une erreur, alors...
{
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
