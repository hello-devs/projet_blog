<?php
if (file_exists('model/Manager.php'))
{
    require_once('model/Manager.php');
}
else
{
    require_once('../model/Manager.php');
}


class CommentManager extends Manager
{


    public function getAllComments($etat)
    {
        switch ($etat)
        {
            case 'all':
                $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC';
                break;

            case 'signal':
                $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signall = 1 ORDER BY comment_date DESC';
                break;

            case 'avalid':
                $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE valid = 0 ORDER BY comment_date DESC';
                break;

            case 'valid':
                $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE valid = 1 ORDER BY comment_date DESC';
                break;

            default:
                // Autre exception
                throw new Exception("Ce type de commentaires n'existe pas !");

        }

        $db = $this->dbConnect();
        $comments = $db->query($sql);

        return $comments;

    }

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $com = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');

        $com->execute([$postId, $author, $comment]);

        //return $affectedLines;
    }

    public function editComment($comId)
    {
        $db = $this->dbConnect();
        $editCom = $db->prepare('
        Update comments
        SET comment = :comment,
        WHERE id = :comId');

        $editCom->execute(array(
        'comment' => $_POST['comment'],
        'comId' => $comId));
    }

    public function signalComment($comId)
    {
        $db = $this->dbConnect();
        $signalCom = $db->exec('
        Update comments
        SET signall = 1
        WHERE id = '.$comId);
    }

    public function validComment($comId)
    {
        $db = $this->dbConnect();
        $validCom = $db->exec('
        Update comments
        SET valid = 1,
        signall = 0
        WHERE id = '.$comId);
    }

    public function deleteComment($comId)
    {
        $db = $this->dbConnect();
        $delCom = $db->exec('
            DELETE FROM comments
            WHERE id ='.$comId);
    }




    //Simplification :ajouter à la classe manager en rajoutant $table aux parametre
    public function getCount($field,$value)
    {
        $db = $this->dbConnect();
        $count = $db->query('SELECT COUNT(*) FROM comments  WHERE '.$field.' = '.$value);

        return $count->fetchColumn();
    }




}
