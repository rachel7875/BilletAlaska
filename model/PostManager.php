<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
  
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, summary, 
        DATE_FORMAT(publicationDate, \'%d/%m/%Y\') AS publicationDateSmall, photoLink FROM posts WHERE publicationDate <= NOW() ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }
    
    public function getPostsAdm()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, title, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate_fr, DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%i\') AS modifDate_fr, 
        publicationDate, DATE_FORMAT(publicationDate, \'%d/%m/%Y à %Hh%i\') AS publicationDate_fr FROM posts ORDER BY numChapter');
        $result=$req->fetchAll();
        $req->closeCursor();
        
        return $result;
    }

    //Methods for obtaining data about the comments for the administration homepage

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
    //End of Methods for obtaining data about the comments for the administration homepage



    
    public function testId($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(*) FROM posts WHERE id = ?');
        $req->execute(array($id));
        $test = $req->fetch();

        return $test;
    }

    public function getPostAdm($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, title, summary, content, photoLink, DATE_FORMAT(creationDate, \'%d/%m/%Y à %Hh%i\') AS creationDate_fr,  
        DATE_FORMAT(modifDate, \'%d/%m/%Y à %Hh%i\') AS modifDate_fr, DATE_FORMAT(publicationDate, \'%Y-%m-%d\') AS publicationDateSmall, 
        DATE_FORMAT(publicationDate, \'%d/%m/%Y\') AS publicationDateSmall_fr FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();

        return $post;
    }

    public function getNbLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, numChapter, photoLink FROM posts WHERE publicationDate <= NOW() ORDER BY numChapter DESC LIMIT 0, 1  ');
        $result=$req->fetch();
        
        return $result;
    }
    
    public function getPostForNumchapter($numChapter)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, numChapter, photoLink FROM posts WHERE publicationDate <= NOW() AND numChapter=?');
        $req->execute(array($numChapter));
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

    public function getPresentItems($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT numChapter, photoLink, publicationDate FROM posts WHERE id = ?');
        $req->execute(array($id));
        $result = $req->fetch();
    
        return $result;
    }
    
    public function testNumChapter($numChapter)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(*) FROM posts WHERE numChapter = ? ');
        $req->execute(array($numChapter));
        $test = $req->fetch();
        
        return $test;
    }
    
    public function testPublication($numChapter)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(*) FROM posts WHERE numChapter = ? AND publicationDate <= NOW() ');
        $req->execute(array($numChapter));
        $test = $req->fetch();
        
        return $test;
    }

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