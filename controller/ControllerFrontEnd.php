<?php

class ControllerFrontEnd
{
    protected $commentManager,$postManager;

    //Constructeur
    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    //Connexion au back Office
    public function connectManagerBlog()
    {
        require('view/frontend/connectManagerBlogView.php');
    }

    /////////////////////////////////////////////////////post

    //Affichage de tout les post
    public function listPosts()
    {
        $posts = $this->postManager->getPosts('publié'); // Appel d'une fonction de cet objet

        require('view/frontend/listPostView.php');
    }

    //Affiche un post et ses commentaires
    public function post($postId)
    {
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getComments($postId);

        require('view/frontend/postView.php');
    }


    ////////////////////////////////////////////////////commentaires

    //Ajouter un commentaire
    public function addComment($postId, $author, $comment)
    {
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

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
    public function signalComment($comId,$postId)
    {
        $this->commentManager->signalComment($comId);

        $this->post($postId);
    }

    /////////////////////////////////////////////////////biographie
    public function bio()
    {
        require('view/frontend/bioView.php');
    }

    /////////////////////////////////////////////////////contact
    public function contact()
    {
        require('view/frontend/contactView.php');
    }

}
