<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, summary, DATE_FORMAT(publicationDate, \'%d/%m/%Y\') AS publicationDateSmall, photoLink FROM posts WHERE publicationDate <= NOW() ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }
    
    public function getNbChapters()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT COUNT(*) AS nbChapters FROM posts');
        $result=$req->fetch();
        $req->closeCursor();
        
        return $result;
    }

    public function getNbPublishedChapters()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT COUNT(*) AS nbPublishedChapters FROM posts WHERE publicationDate <= NOW()  ');
        $result=$req->fetch();
        $req->closeCursor();
        
        return $result;
    }
    
    public function getNbChaptersPlannedPublication()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT COUNT(*) AS nbChaptersPlannedPublication FROM posts WHERE publicationDate > NOW()  ');
        $result=$req->fetch();
        $req->closeCursor();
        
        return $result;
    }

    public function getNbChaptersUnplannedPublication()
    {
        $db = $this->dbConnect();
        $req= $db->query('SELECT COUNT(*) AS nbChaptersUnplannedPublication FROM posts WHERE publicationDate is NULL  ');
        $result=$req->fetch();
        $req->closeCursor();
        
        return $result;
    }


    public function getPostsAdm()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate_fr, DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%i\') AS modifDate_fr, 
        DATE_FORMAT(publicationDate, \'%d/%m/%Y à %Hh%i\') AS publicationDate_fr FROM posts ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, content, photoLink, DATE_FORMAT(publicationDate, \'%d/%m/%Y\') AS publicationDateSmall FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostAdm($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, summary, content, photoLink, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate_fr,  
        DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%i\') AS modifDate_fr, DATE_FORMAT(publicationDate, \'%d/%m/%Y\') AS publicationDateSmall  FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }

    public function getNbLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT MAX(id) AS maxId FROM posts WHERE publicationDate <= NOW()');
        $result=$req->fetch();
        
        return $result;
    }

    public function getNbLastPostAdm()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT MAX(id) AS maxId FROM posts');
        $result=$req->fetch();
        
        return $result;
    }

    public function modifyPost($new_numChapter, $new_title, $new_content, $new_summary, $new_photoLink, $new_publicationDate, $id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET numChapter = ?, title = ?, content = ?, summary = ?, photoLink = ?, publicationDate = ?, modifDate = NOW() WHERE id = ?');
        $result = $req->execute(array($new_numChapter, $new_title, $new_content, $new_summary, $new_photoLink, $new_publicationDate,$id));
       
        return $result;
    }

    public function getPresentPhotoPublication($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT photoLink, publicationDate FROM posts WHERE id = ?');
        $req->execute(array($id));
        $result = $req->fetch();
    
        return $result;
    }

 //   public function listNumChapters()
   // {
    //    $db = $this->dbConnect();
    //    $req = $db->query('SELECT numChapter FROM posts');
    //    $result=$req->fetchAll();
     //   $req->closeCursor();
        
      //  return $result;
   // }


    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }
  
    public function sendPost($numChapter, $title, $content, $summary, $photoLink, $publicationDate)
    {
        $db = $this->dbConnect();
       // $req = $db->prepare('INSERT INTO posts(numChapter, title, content, summary, photoLink, publicationDate, creationDate) VALUES(?, ?, ?, ?, ?, ?, NOW())');
       // $result = $req->execute(array($numChapter, $title, $content, $summary, $photoLink, $publicationDate));

        $req = $db->prepare('INSERT INTO posts(numChapter, title, content, summary, photoLink, publicationDate, creationDate) VALUES(:numChapter, :title, :content, :summary,
        :photoLink, :publicationDate, NOW())');
        $result = $req->execute(array(
            'numChapter' => $numChapter,
            'title'=> $title,
            'content'=> $content,
            'summary'=> $summary,
            'photoLink'=> $photoLink,
            'publicationDate'=> $publicationDate
            ));

        return $result;
    }
}