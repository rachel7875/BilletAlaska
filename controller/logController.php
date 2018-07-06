<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes

require_once('model/AdminManager.php');

class LogController { 
    
    public function login($request)
    {
      $adminManager = new \OpenClassrooms\Blog\Model\AdminManager();
 
        if (!isset($request['loginName']) OR !isset($request['pass']) OR empty($request['loginName']) OR empty($request['pass'])) { 
            throw new \Exception('Vous n\'avez pas saisi votre identifiant ou votre mot de passe.');
        }
        else {
            $tableDataForLoginName = $adminManager->getTableDataForLoginName($request['loginName']);
            $isPasswordCorrect=password_verify($request['pass'],$tableDataForLoginName['pass']);

            if (!$tableDataForLoginName){
                throw new \Exception('Mauvais identifiant ou mot de passe  !');
            }
            else {
             
                if ($isPasswordCorrect) {
                  session_start();
                    $_SESSION['idUser'] = $tableDataForLoginName['idUser'];
                    $_SESSION['loginName'] = $request['loginName'];
                  
           
                    header('Location: index.php?action=administration');
                }
                else {
                    throw new \Exception('Mauvais identifiant ou mot de passe !');
                }
            }
        }
        
    }


    public function logout()
    {
        session_start();

        // Removal of session variables and session
        $_SESSION = array();
        session_destroy();
        
        header('Location:index.php?action=adminLoginFormOut');
    }    




}