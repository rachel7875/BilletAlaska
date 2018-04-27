<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
   
   // public function getComments()
   // {
   //     $db = $this->dbConnect();
   //     $req = $db->query('SELECT commentId, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr FROM comments ORDER BY commentDate LIMIT 0, 10');
    //    $result=$req->fetchAll();
     //   $req->closeCursor();
        
    //    return $result;
   // }
   
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT commentId, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr FROM comments WHERE postId = ? ORDER BY commentDate DESC');
        $req->execute(array($postId));
        $result=$req->fetchAll();
        $req->closeCursor();
        

        return $result;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT id, author, comment, post_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ? ');
        $req->execute(array($id));
        $comment = $req->fetch();

        return $comment;
    }

  

    public function modifyComment($id, $new_author, $new_comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET author = :new_author, comment = :new_comment, comment_date = NOW() WHERE id = :id');
        $affectedComment = $comments->execute(array(
            'new_author' => $new_author,
            'new_comment'=> $new_comment,
            'id' => $id
        ));

        return $affectedComment;    
    }
}