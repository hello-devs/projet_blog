<?php

// Chargement des classes
function chargerClasseAdmin($class)
{
    require_once('../model/' . $class. '.php');
}



//Accueil du Back Office
function manageBlog()
{
    //recup des posts
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPostss('all'); // Appel d'une fonction de cet objet


    //recup des coms et comptage
    $commentManager = new CommentManager();
    $comments = $commentManager->getAllComments('all');
    $commentsValidCount = $commentManager->getCount('valid','1');
    $commentsToValidCount = $commentManager->getCount('valid','0');
    $commentsSignalCount = $commentManager->getCount('signall','1');



    require('../view/backEnd/manageBlogView.php');
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



    require('../view/backEnd/manageComsView.php');

}

//Validation d'un commentaire
function validCom($comId)
{
    $commentManager = new CommentManager();
    $commentManager->validComment($comId);

    manageComs();
}


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
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPostss(all); // Appel d'une fonction de cet objet

    require('../view/backend/managePostsView.php');
}

//Gestion d'un article
function manageArticle($id)
{
    //
    echo 'afficher l\'article '.$id.' pour RUD';
}










function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPostss(all); // Appel d'une fonction de cet objet

    require('../view/backEnd/managePostView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('../view/frontend/postView.php');
}

