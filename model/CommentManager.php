<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
   
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT commentId, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr FROM comments WHERE postId = ? AND stage NOT IN ("effacé du site public") ORDER BY commentDate DESC');
        $req->execute(array($postId));
        $result=$req->fetchAll();
        $req->closeCursor();
        

        return $result;
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET stage = "signalé" WHERE commentId = ?');
        $result = $req->execute(array($commentId));

        return $result;
    }
        
    public function getReportedComment($commentId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT commentId, postId FROM comments WHERE commentId = ? ');
        $req->execute(array($commentId));
        $result = $req->fetch();

        return $result;   
    }


    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(postId, author, comment, commentDate, stage) VALUES(?, ?, ?, NOW(), \'initial\')');
        $result = $req->execute(array($postId, $author, $comment));

        return $result;
    }

    public function getCommentsAdm()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT c.commentId commentId, c.author author, c.comment comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') AS commentDate_fr, c.stage stage, p.numChapter numChapter, p.title title
        FROM comments c INNER JOIN posts p 
        ON c.postId = p.id
        ORDER BY stage DESC, commentDate DESC');
        $result=$req->fetchAll();
        $req->closeCursor();
        //c.DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin%ss\') commentDate_fr

        return $result;
    }
    
    public function getCommentAdm($commentId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT c.author author, c.comment comment, p.numChapter numChapter, p.title title
        FROM comments c INNER JOIN posts p 
        ON c.postId = p.id
        WHERE commentId = ? ');
        $req->execute(array($commentId));
        $result = $req->fetch();

        return $result;   
    }

    public function modifyComment($commentId, $new_author, $new_comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET author =:new_author, comment =:new_comment, stage = "modéré", commentDate = NOW() WHERE commentId = :commentId');
        $result = $req->execute(array(
            'new_author' => $new_author,
            'new_comment' => $new_comment,
            'commentId' => $commentId
        ));
        return $result;
    }
    
    public function deletePublicComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET stage = "effacé du site public"  WHERE commentId = ?');
        $result = $req->execute(array($commentId));
        return $result;
    }
}