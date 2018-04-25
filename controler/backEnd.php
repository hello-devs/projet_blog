<?php
/*
// Chargement des classes
function chargerClasseAdmin($class)
{
    require_once('../model/' . $class. '.php');
}
*/

//Verifie donnée de connexion
function verifUserAuth($logName,$pwd)
{
    //Vérification de l'existance de l'utilisateur
    $userManager = new UserManager();
    $tryConnect = $userManager->verifLog($logName,$pwd);

    switch($tryConnect)
    {
        case UserManager::PSEUDO_INCONNU:

            $errorMessage = "Cet utilisateur n'existe pas";
            require('view/frontend/connectManagerBlogView.php');
            break;

        case UserManager::MOT_DE_PASSE_INCORRECT:

            $errorMessage = "Le nom d'utilisateur et le mot de passe ne correspondent pas";
            require('view/frontend/connectManagerBlogView.php');
            break;

        case UserManager::USER_VERIFIED;

            manageBlog();
            break;
    }




}


//Accueil du Back Office
function manageBlog()
{
    //recup des posts
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts('all'); // Appel d'une fonction de cet objet

    //recup des coms et comptage
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments('all');
    $commentsValidCount = $commentManager->getCount('valid','1');
    $commentsToValidCount = $commentManager->getCount('valid','0');
    $commentsSignalCount = $commentManager->getCount('signall','1');

    require('view/backend/manageBlogView.php');
}


/////////////////////////////////Commentaires

//Gestions des commentaires
function manageComs()
{
    //recup des coms et comptage
    $commentManager = new CommentManager();
    $commentsSignal = $commentManager->getAllComments('signal');
    $commentsAvalid = $commentManager->getAllComments('avalid');
    $commentsValid = $commentManager->getAllComments('valid');

    require('view/backend/manageComsView.php');
}

//Validation d'un commentaire
function validCom($comId)
{
    $commentManager = new CommentManager();
    $commentManager->validComment($comId);

    manageComs();
}

//Effacer un commentaire
function deleteCom($comId)
{
    $commentManager = new CommentManager();
    $commentManager->deleteComment($comId);

    manageComs();
}

////////////////////////////////////////////Articles

//Gestion des articles
function managePosts()
{
     //recup des posts
    $postManager = new PostManager();
    $posts = $postManager->getPosts('all');

    require('view/backend/managePostsView.php');
}

//Gestion des articles


//Création d'un article
function createArticle()
{
    require('view/backend/addPostView.php');
}

//Insertion d'un article dans la bdd
function ajouterPost()
{
    $postManager = new PostManager();
    $newPost = $postManager->ajouterPost();

    managePost($newPost['id'],$newPost['message']);
}

//Gestion d'un article
function managePost($id , $message = null)
{
    //
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);

    require('view/backend/managePostView.php');
}

//Mise à jour d'un article
function editPost($postId)
{
    $postManager = new PostManager();
    $message = $postManager->editPost($postId);

    managePost($postId);
}

//Supprimer un article
function deletePost($postId)
{
    $postManager = new PostManager();
    $postManager->deletePost($postId);

    managePosts();
}

//Gestion Publié et brouillon
//Mise à jour d'un article
function changerEtatPost($postId,$etat)
{
    $postManager = new PostManager();
    $postManager->changeEtatPost($postId, $etat);

    managePost($postId);
}







