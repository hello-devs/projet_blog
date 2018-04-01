<?php
require('../controler/backEnd.php');
spl_autoload_register('chargerClasseAdmin');

session_start();

//echo $_SERVER['REQUEST_URI'];

try
{
    if (isset($_GET['action']))
    {

        if ($_GET['action'] == 'manageBlog')
        {
            manageBlog();
        }
        ///////////////////////////////////////////Commentaires
        elseif ($_GET['action'] == 'manageComs')
        {
            manageComs();
        }
        elseif ($_GET['action'] == 'validCom')
        {
             if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                validCom($_GET['id']);
                //manageComs();
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        }
        elseif ($_GET['action'] == 'deleteCom')
        {
             if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                deleteCom($_GET['id']);
                //manageComs();
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        }


















        //////////////////////////////////////////Articles
        elseif ($_GET['action'] == 'manageArticles')
        {
            managePosts();
        }

        elseif ($_GET['action'] == 'manageArticle')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                manageArticle($_GET['id']);
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant d\'article envoyé');
            }
        }
        /*
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
        */
    }
    else
    {
        manageBlog();
    }
}
catch(Exception $e)  // S'il y a eu une erreur, alors...
{
    $errorMessage = $e->getMessage();
    require('../view/backend/errorView.php');
}
