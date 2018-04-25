<?php

require('controler/frontEnd.php');
require('controler/backEnd.php');

//autoload
spl_autoload_register('chargerClasse');


session_start();

//Initialisation de la Variable d'authentification
if(!isset($_SESSION['authentified']))
$_SESSION['authentified'] = false;
//var_dump($_SESSION['authentified']) ;

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


/////////////////////////////////////////////Admin

        elseif($_SESSION['authentified'] != true)
        {
            if ($_GET['action'] == 'adminConnect')
            {
                connectManagerBlog();
            }
            elseif($_GET['action'] == 'verifUserAuth')
            {
                if(isset($_POST['logName']) && isset($_POST['pwd']))
                {
                    verifUserAuth($_POST['logName'],$_POST['pwd']);
                }
                else
                {
                    throw new Exception('Identifiants ou mot de passe non conforme!');
                }
            }
            else
            {
                listPosts();
            }
        }

        elseif($_SESSION['authentified'] == true)
        {

            ////////////////
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
                    if(!empty($_POST['titre']) AND !empty($_POST['contenu']))
                    {
                        editPost($_GET['id']);  //Maj du post
                    }
                    else
                    {
                        throw new Exception('Le champ "Titre de l\'article" et son contenu ne peuvent être vide');
                    }

                }
                else
                {
                    // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                    throw new Exception('Aucun identifiant d\'article envoyé');
                }
            }
            elseif ($_GET['action'] == 'deletePost')     //Suppression de l'article
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    deletePost($_GET['id']);
                }
                else
                {
                    // Autre exception
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            elseif ($_GET['action'] == 'changerEtatPost')     //Edition d'un article
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {

                    if (isset($_GET['etat']))
                    {
                        if($_GET['etat']=='publié' || $_GET['etat']=='brouillon')
                        {
                            changerEtatPost($_GET['id'],$_GET['etat']);  //Maj du status
                        }
                        else
                        {
                            throw new Exception('Cet état ne convient pas a un article');
                        }
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Aucun état d\'article envoyé');
                    }
                }
                else
                {
                    // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                    throw new Exception('Aucun identifiant d\'article envoyé');
                }
            }
            else
            {
                manageBlog();
            }
        }
/////////////////////////////////////////////Fin Admin
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
