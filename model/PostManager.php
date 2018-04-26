<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, summary, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts ORDER BY creationDate LIMIT 0, 10');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }

    public function getLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, summary, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts ORDER BY creationDate DESC LIMIT 0, 1');
        $result=$req->fetch();
        
        return $result;
    }
  


    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}