<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, summary, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts ORDER BY creationDate');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }
    
    public function getPostsAdm()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr, DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modifDate_fr FROM posts ORDER BY id');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostAdm($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, summary, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr,  DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modifDate_fr  FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }

    public function getNbLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT MAX(id) AS maxId FROM posts');
        $result=$req->fetch();
        
        return $result;
    }

    public function modifyPost($id, $new_title, $new_content, $new_summary)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title =:new_title, content =:new_content, summary = :new_summary, modifDate = NOW() WHERE id = :id');
        $result = $req->execute(array(
            'new_title' => $new_title,
            'new_content'=> $new_content,
            'new_summary'=> $new_summary,
            'id' => $id
        ));
        return $result;
    }
  
}