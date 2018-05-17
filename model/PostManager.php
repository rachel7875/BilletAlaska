<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, summary, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }
    
    public function getPostsAdm()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr, DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modifDate_fr FROM posts ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostAdm($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, summary, content, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate_fr,  DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%imin%ss\') AS modifDate_fr  FROM posts WHERE id = ?');
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

    public function modifyPost($id, $new_numChapter, $new_title, $new_content, $new_summary)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET numChapter =:new_numChapter, title =:new_title, content =:new_content, summary = :new_summary, modifDate = NOW() WHERE id = :id');
        $result = $req->execute(array(
            'new_numChapter' => $new_numChapter,
            'new_title' => $new_title,
            'new_content'=> $new_content,
            'new_summary'=> $new_summary,
            'id' => $id
        ));
        return $result;
    }

    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }
  
    public function sendPost($numChapter, $title, $content, $summary)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(numChapter, title, content, summary, creationDate) VALUES(?, ?, ?, ?, NOW())');
        $result = $req->execute(array($numChapter, $title, $content, $summary));

        return $result;
    }
}