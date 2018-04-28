<?php

function chargerClasse($class)
{
    require_once('model/' . $class. '.php');
}


//Connexion au back Office
function connectManagerBlog()
{
    require('view/frontend/connectManagerBlogView.php');
}

/////////////////////////////////////////////////////post

//Affichage de tout les post
function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts('publié'); // Appel d'une fonction de cet objet

    $commentManager = new CommentManager();

    require('view/frontend/listPostView.php');
}

//Affiche un post et ses commentaires
function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/frontend/postView.php');
}


////////////////////////////////////////////////////commentaires

//Ajouter un commentaire
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        //Retour à l'affichage du post   !!! essayer post($postId);
        header('Location: index.php?action=post&id=' . $postId);
    }
}

//Signaler un commentaire
function signalComment($comId,$postId)
{
    $commentManager = new CommentManager();
    $commentManager->signalComment($comId);

    post($postId);
}

/////////////////////////////////////////////////////biographie
function bio()
{
    require('view/frontend/bioView.php');
}

/////////////////////////////////////////////////////contact
function contact()
{
    require('view/frontend/contactView.php');
}
