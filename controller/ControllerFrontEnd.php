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
    public function contact($messageSend = null)
    {
        $view = new View('contact','frontend');
        $view->generer(['messageSend' => $messageSend]);
    }

    public function sendMail()
    {
        if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['message']) && isset($_POST['email']))
        {
            $mail = 'cirer972@gmail.com';// Déclaration de l'adresse de destination.
            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
            {
                $passage_ligne = "\r\n";
            }
            else
            {
                $passage_ligne = "\n";
            }
            //=====Déclaration des messages au format texte et au format HTML.
            $message_txt = "Message de ".$_POST['first_name']." ".$_POST['last_name']." contenu:".$_POST['message'];
            $message_html = "<html><head></head><body>Message de <b>".$_POST['first_name']." ".$_POST['last_name']."</b>,<br> ".$_POST['message']."</body></html>";
            //==========
            //=====Création de la boundary
            $boundary = "-----=".md5(rand());
            //==========
            //=====Définition du sujet.
            $sujet = "Message d'un visiteur du blog";
            //=========
            //=====Création du header de l'e-mail.
            $header = "From: \"Hello-devs\"<projet-blog-oc@hello-devs.com>".$passage_ligne; //mail-out.cluster023.hosting.ovh.net
            $header.= "Reply-to: \"".$_POST['first_name']."\" <".$_POST['email'].">".$passage_ligne;
            $header.= "MIME-Version: 1.0".$passage_ligne;
            $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
            //==========
            //=====Création du message.
            $message = $passage_ligne."--".$boundary.$passage_ligne;
            //=====Ajout du message au format texte.
            $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
            $message.= $passage_ligne.$message_txt.$passage_ligne;
            //==========
            $message.= $passage_ligne."--".$boundary.$passage_ligne;
            //=====Ajout du message au format HTML
            $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
            $message.= $passage_ligne.$message_html.$passage_ligne;
            //==========
            $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
            $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
            //==========
            //=====Envoi de l'e-mail.
            $envoi = mail($mail,$sujet,$message,$header);
            //==========

            if($envoi == true)
            {
                $messageSend = 'Votre message a été expedié';
            }
            else
            {
                $messageSend = 'Echec d\'envoi du message';
            }

            $this->contact($messageSend);
        }
        else
        {
            $messageSend = 'Echec d\'envoi du message';
            $this->contact($messageSend);
        }
    }

}
