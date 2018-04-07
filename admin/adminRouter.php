<?php
require('../controler/backEnd.php');
spl_autoload_register('chargerClasseAdmin');

session_start();

//echo $_SERVER['REQUEST_URI'];

try
{
    if (isset($_GET['action']))
    {

        if ($_GET['action'] == 'manageBlog')  //Tableau de bord de l'admin
        {
            manageBlog();
        }


        ///////////////////////////////////////////***Commentaires

        elseif ($_GET['action'] == 'manageComs')  //Gestion de tous les commentaires
        {
            manageComs();
        }
        elseif ($_GET['action'] == 'validCom')   //Validation d'un commentaire
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
        elseif ($_GET['action'] == 'deleteCom')  //Suppression d'un commentaire
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


        //////////////////////////////////////////***Articles

        elseif ($_GET['action'] == 'manageArticles')   //Gestion de tous les articles
        {
            managePosts();
        }
        elseif ($_GET['action'] == 'createArticle')    //Création d'un article
        {
            if(isset($_POST['titre']) AND isset($_POST['contenu']))
            {
                ajouterPost();  //Ajout à la bdd
            }
            else
            {
                createArticle();   //Rédaction de l'article
            }
        }


        elseif ($_GET['action'] == 'managePost')     //Gestion d'un article
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                managePost($_GET['id']);
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant d\'article envoyé');
            }
        }
        elseif ($_GET['action'] == 'editPost')     //Edition d'un article
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                editPost($_GET['id']);  //Maj du post
            }
            else
            {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant d\'article envoyé');
            }
        }
        /*
        elseif ($_GET['action'] == 'deletePost')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                //
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
        manageBlog();  //Tableau de bord de l'administration
    }
}
catch(Exception $e)  // S'il y a eu une erreur, alors...
{
    $errorMessage = $e->getMessage();
    require('../view/backend/errorView.php');
}
