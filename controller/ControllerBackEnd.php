<?php

class ControllerBackEnd
{


    protected $userManager,$postManager,$commentManager;

    //Constructeur
    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }


//////////////////////////////////////////////////////////////////
    //Verifie donnée de connexion
    public function verifUserAuth($logName,$pwd)
    {
        //Vérification de l'existance de l'utilisateur
        $tryConnect = $this->userManager->verifLog($logName,$pwd);

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

                $this->manageBlog();
                break;
        }




    }


    //Accueil du Back Office
    public function manageBlog()
    {
        //recup des posts
        $posts = $this->postManager->getPosts('all'); // Appel d'une fonction de cet objet

        //recup des coms et comptage
        $comments = $this->commentManager->getAllComments('all');
        $commentsValidCount = $this->commentManager->getCount('valid','1');
        $commentsToValidCount = $this->commentManager->getCount('valid','0');
        $commentsSignalCount = $this->commentManager->getCount('signall','1');

        require('view/backend/manageBlogView.php');
    }


    /////////////////////////////////Commentaires

    //Gestions des commentaires
    public function manageComs()
    {
        //recup des coms et comptage
        $commentsSignal = $this->commentManager->getAllComments('signal');
        $commentsAvalid = $this->commentManager->getAllComments('avalid');
        $commentsValid = $this->commentManager->getAllComments('valid');

        require('view/backend/manageComsView.php');
    }

    //Validation d'un commentaire
    public function validCom($comId)
    {
        $this->commentManager->validComment($comId);

        $this->manageComs();
    }

    //Effacer un commentaire
    public function deleteCom($comId)
    {
        $this->commentManager->deleteComment($comId);

        $this->manageComs();
    }

    ////////////////////////////////////////////Articles

    //Gestion des articles
    public function managePosts()
    {
         //recup des posts
        $posts = $this->postManager->getPosts('all');

        require('view/backend/managePostsView.php');
    }

    //Gestion des articles


    //Création d'un article
    public function createArticle()
    {
        require('view/backend/addPostView.php');
    }

    //Insertion d'un article dans la bdd
    public function ajouterPost()
    {
        $newPost = $this->postManager->ajouterPost();

        $this->managePost($newPost['id'],$newPost['message']);
    }

    //Gestion d'un article
    public function managePost($id , $message = null)
    {
        $post = $this->postManager->getPost($id);
        $comments = $this->commentManager->getComments($id);

        require('view/backend/managePostView.php');
    }

    //Mise à jour d'un article
    public function editPost($postId)
    {
        $message = $this->postManager->editPost($postId);

        $this->managePost($postId);
    }

    //Supprimer un article
    public function deletePost($postId)
    {
        $this->postManager->deletePost($postId);

        $this->managePosts();
    }

    //Gestion Publié et brouillon
    //Mise à jour d'un article
    public function changerEtatPost($postId,$etat)
    {
        $this->postManager->changeEtatPost($postId, $etat);

        $this->managePost($postId);
    }


    //Déconnexion de l'espace d'administration:
    public function decoAdmin()
    {

        session_destroy();

        $errorMessage = "Vous avez été déconnecté !";
        require('view/frontend/connectManagerBlogView.php');
    }

}
