<?php

require_once('model/Manager.php');

class PostManager extends Manager
{
    //Ajouter un article (c)
    public function ajouterPost()
    {
        $date = new DateTime('now',new DateTimeZone('Europe/Paris'));  // Date actuelle
        $date_string = $date->format('Y-m-d H:m:s');

        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:titre, :contenu, :date)');

        $newPost->execute(array(
        'titre'=>$_POST['titre'],
        'contenu'=>$_POST['contenu'],
        'date'=>$date_string));

        $newPost = array(
            'id' => $db->lastInsertId(),  //On récupère l' id du post que l'on vient de créer
            'message' => 'ARTICLE ENVOY&Eacute;:'  //Création du message a afficher dans la vue suivante.
        );

        return $newPost;
    }

    //Récupérer des articles (r)
    public function getPosts($etat)
    {
        switch($etat)
        {
            case ('all'):
                $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, etat FROM posts ORDER BY creation_date DESC';
                break;

            case ('publié'):
                $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, etat FROM posts WHERE etat = "publié" ORDER BY creation_date DESC';
                break;

            case ('brouillon'):
                $sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, etat FROM posts WHERE etat = "brouillon" ORDER BY creation_date DESC';
                break;

            default:
                throw new Exception("Ce cas n'est pas prévu par le développeur dans sa fonction getPosts() !");
        }

        $db = $this->dbConnect();
        $req = $db->query($sql);

        return $req;
    }

    //Récupérer un article (r)
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, etat FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    //Modifier un article (u)
    public function editPost($postId)
    {
        $db = $this->dbConnect();
        $editPost = $db->prepare('
        Update posts
        SET title = :title,
        content = :content
        WHERE id = :postId');

        $editPost->execute(array(
            'title' => $_POST['titre'],
            'content' => $_POST['contenu'],
            'postId' => $postId));

        return 'POST MIS &Agrave; JOUR';
    }

    //Effacer un article (d)
    public function deletePost($postID)
    {
        $db = $this->dbConnect();
        $delPost = $db->exec('
            DELETE FROM posts
            WHERE id ='.$postID);
    }


    //changer status d'article
    function changeEtatPost($postId, $etat)
    {
        $db = $this->dbConnect();
        $editPost = $db->prepare('
        Update posts
        SET etat = :etat
        WHERE id = :postId');

        $editPost->execute(array(
            'etat' => $etat,
            'postId' => $postId));

    }




}
