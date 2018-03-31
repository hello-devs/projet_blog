<?php

function chargerClasse($class)
{
    require_once('model/' . $class. '.php');
}


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPostss('publié'); // Appel d'une fonction de cet objet

    $commentManager = new CommentManager();

    require('view/frontend/listPostView.php');
}

function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/frontend/postView.php');
}




//////////////////////////////////////////////////////////commentaires

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function signalComment($comId,$postId)
{
    echo 'pas achevé';
    $commentManager = new CommentManager();
    $commentManager->signalComment($comId);

    post($postId);
}

//////////////////////////////////////////////////////////biographie
function bio()
{
    require('view/frontend/bioView.php');
}

/////////////////////////////////////////////////////contact
function contact()
{
    require('view/frontend/contactView.php');
}
