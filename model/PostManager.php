<?php
if (file_exists('model/Manager.php'))
{
    require_once('model/Manager.php');
}
else
{
    require_once('../model/Manager.php');
}

class PostManager extends Manager
{
    public function getPosts()  //A remplacer par getPostss($etat)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, etat FROM posts ORDER BY creation_date DESC');

        return $req;
    }

    public function getPostss($etat)
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

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, etat FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function editPost($postId)
    {
        $db = $this->dbConnect();
        $editPost = $db->prepare('
        Update posts
        SET title = :title,
        content = :content,
        WHERE id = :postId');

        $editPost->execute(array(
        'content' => $_POST['content'],
        'postId' => $postId));
    }

    public function deletePost($postID)
    {
        $db = $this->dbConnect();
        $delPost = $db->exec('
            DELETE FROM posts
            WHERE id ='.$postID);
    }



}
