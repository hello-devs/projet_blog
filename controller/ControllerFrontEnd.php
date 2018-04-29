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
        $view = new View('connectManagerBlog','frontend');
        $view->generer(['connect']);
    }

    /////////////////////////////////////////////////////post

    //Affichage de tout les post
    public function listPosts()
    {
        $posts = $this->postManager->getPosts('publié'); // Appel d'une fonction de cet objet
        $commentManager = $this->commentManager;

        $view = new View('listPost','frontend');
        $view->generer(['posts' => $posts, 'commentManager' => $commentManager]);
    }

    //Affiche un post et ses commentaires
    public function post($postId)
    {
        $post = $this->postManager->getPost($postId);
        $comments = $this->commentManager->getComments($postId);

        $view = new View('post','frontend');
        $view->generer(['post' => $post, 'comments' => $comments]);
    }


    ////////////////////////////////////////////////////commentaires

    //Ajouter un commentaire
    public function addComment($postId, $author, $comment)
    {
        $affectedLines = $this->commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false)
        {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else
        {
            $this->post($postId);
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
        $view = new View('bio','frontend');
        $view->generer(['bio']);
    }

    /////////////////////////////////////////////////////contact
    public function contact()
    {
       $view = new View('contact','frontend');
       $view->generer(['contact']);
    }

}
