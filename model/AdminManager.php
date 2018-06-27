<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
  
    public function getTableDataForLoginName($loginName)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT idUser, pass FROM users WHERE loginName = ?');
        $req->execute(array($loginName));
        $result = $req->fetch();
        
        $req->closeCursor();
        
        return $result;
    }
   
}