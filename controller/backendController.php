<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class BackController { 

    
 public function __construct()
   {
   
   session_start();
  
        if (! isset($_SESSION['idUser']) OR ! isset($_SESSION['loginName'])) {
            throw new \Exception('Non autorisé'); 
        }
     

    }
  
  
    public function viewPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();

            $test = $postManager->testId($request['id']);
          
            if ($test['COUNT(*)']!=1) {
                throw new \Exception('L\'identifiant de billet envoyé n\'existe pas.');
            }

            $postAdm=$postManager->getPostAdm($request['id']);
            require('view/backend/postAdmView.php');
        }
        else {
            throw new \Exception('Aucun identifiant de chapitre envoyé');
        }   
    }


    public function rectifyFormPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();

            $test = $postManager->testId($request['id']);
          
            if ($test['COUNT(*)']!=1) {
                throw new \Exception('L\'identifiant de billet envoyé n\'existe pas.');
            }
            $postToModify=$postManager->getPostAdm($request['id']);
            require('view/backend/postRectifyFormView.php');
        }
        else {
            throw new \Exception('Aucun identifiant de chapitre envoyé');
        }
    }



    public function rectifyPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) { 
            $new_photoLink=$this->upload($_FILES['new_chapterPhoto']);

            if(!empty($request['new_numChapter'])){
                $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                
                $present=$postManager->getPresentItems($request['id']);
                $test = $postManager->testNumChapter($request['new_numChapter']);
               

                if ($test['COUNT(*)']==1) {
           
                    if ($request['new_numChapter']== $present['numChapter']) {
                  
                        $new_numChapter=$present['numChapter'];  
                    }
                    else {
                        throw new \Exception('Ce numéro de chapitre existe déjà. Merci d\'en choisir un autre.');
                    }
                }
               
                else {
                    $new_numChapter=$request['new_numChapter']; 

                }  
            

            
                if (!empty($request['new_title']) && !empty($request['new_content']) && !empty($request['new_summary'])) {
                    if(!isset($_FILES['new_chapterPhoto']) OR $_FILES['new_chapterPhoto']['error'] !== 0){
                        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                        $present=$postManager->getPresentItems($request['id']);

                        $new_photoLink=$present['photoLink'];

                    }
                
                    
                        if(!empty($request['new_publicationDateSimple'])){
                            $new_publicationDate=$request['new_publicationDateSimple'] . ' 00:00:00';
                        }
                        else {
                            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                            $present=$postManager->getPresentItems($request['id']);

                            $new_publicationDate=$present['publicationDate'];  
                        }
                        

                        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                        $modifiedPost=$postManager->modifyPost($new_numChapter, $request['new_title'], $request['new_content'], $request['new_summary'], $new_photoLink, $new_publicationDate, $request['id']);
                        if ($modifiedPost === false) {
                            throw new \Exception('Impossible de modifier le chapitre !');
                        }
                        else {
                            header('Location: index.php?action=viewPostAdm&id=' . $request['id']);
                        }
                    
                }
                else {
                    throw new \Exception('Tous les champs ne sont pas remplis  !');
                } 
            }       
            else {
                throw new \Exception('Tous les champs ne sont pas remplis  !');
            }
        }
        else {
            throw new \Exception('Aucun identifiant de chapitre envoyé');
        }        
    } 

    public function deletePost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $deletedPost = $postManager->deletePost($request['id']);
            header('Location: index.php?action=listPostsAdm');
        }
        else {
            throw new \Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    public function addFormPost()
    {
        require('view/backend/chapterAddFormView.php');
    }

    public function addPost($request)
    {   
        $photoLink=$this->upload($_FILES['chapterPhoto']);

        if ($_FILES['chapterPhoto']['error']==1)
        {
            throw new \Exception('La taille du fichier est trop importante.');
        }            
        
        
        if (!empty($request['numChapter']) && !empty($request['title']) && !empty($request['summary']) && !empty($request['content']) && 
        (isset($_FILES['chapterPhoto']) AND $_FILES['chapterPhoto']['error'] == 0)  ) 
        {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $test = $postManager->testNumChapter($request['numChapter']);

            if ($test['COUNT(*)']==1) {
                throw new \Exception('Ce numéro de chapitre existe déjà. Merci d\'en choisir un autre.');
            }
            else {

                $publicationDate=!empty($request['publicationDateSimple']) ? $request['publicationDateSimple'] . ' 00:00:00' :  NULL;
                $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                $post = $postManager->sendPost($request['numChapter'], $request['title'], $request['content'], $request['summary'], $photoLink, $publicationDate);
                if ($post === false) {
                    throw new \Exception('Impossible d\'ajouter le chapitre !');
                }
                else {
                    $lastpostadm=$postManager->getNbLastPostAdm();
                
                    header('Location: index.php?action=viewPostAdm&id='.$lastpostadm['maxId']); 
                
                
                }
            }
        }
        else {
            throw new \Exception('Tous les champs ne sont pas remplis !');
        }
    }
    
    public function adm()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

                    $nbchapters = $postManager->getNbChapters();
                    $nbPublishedChapters= $postManager->getNbPublishedChapters();
                    $nbChaptersPlannedPublication= $postManager->getNbChaptersPlannedPublication();
                    $nbChaptersUnplannedPublication= $postManager->getNbChaptersUnplannedPublication();
                    
                    $nbCommentsAdm= $commentManager->getNbCommentsAdm();
                    $nbVisibleComments= $commentManager->getNbVisibleComments();
                    $nbVisibleReportedComments= $commentManager->getNbVisibleReportedComments();
                    $nbVisibleOriginalComments= $commentManager->getNbVisibleOriginalComments();
                    $nbVisibleModeratedComments= $commentManager->getNbVisibleModeratedComments();
                    $nbVisibleAuthorComments= $commentManager->getNbVisibleAuthorComments();
            
                    require('view/backend/homeAdmView.php');
    }

    public function listPostsAdm()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        
        $postsAdm = $postManager->getPostsAdm();
     
        require('view/backend/postsMgtAdmView.php');
    }

    public function listCommentsAdm()
    {
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

        $commentsAdm = $commentManager->getCommentsAdm();

        require('view/backend/commentsMgtAdmView.php');
    }

    public function moderateFormComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $commentToModify=$commentManager->getCommentAdm($request['commentId']);
            require('view/backend/commentModerateFormView.php');
         }
         else {
            throw new \Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function rectifyComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
           
            if (!empty($request['new_author']) && !empty($request['new_comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $modifiedComment = $commentManager->modifyComment($request['commentId'], $request['new_author'], $request['new_comment']);
                if ($modifiedComment === false) {
                    throw new \Exception('Impossible de modifier le commentaire !');
                }
                else {
                    header('Location: index.php?action=listCommentsAdm');
                }
            }
            else {
                throw new \Exception('Tous les champs ne sont pas remplis  !');
            }
        }
         else {
            throw new \Exception('Aucun identifiant de commentaire envoyé');
        }    
    } 

    public function deletePublicComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $deletedPublicComment = $commentManager->deletePublicComment($request['commentId']);
    
            header('Location: index.php?action=listCommentsAdm');
        }
        else {
            throw new \Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function restorePublicComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $restoredPublicComment = $commentManager->restorePublicComment($request['commentId']);
            header('Location: index.php?action=listCommentsAdm');
        }
        else {
            throw new \Exception('Aucun identifiant de commentaire envoyé');
        }
    }
    
    public function addFormComment($request)
    {
        if (isset($request['numChapter']) && $request['numChapter'] > 0){
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $test = $postManager->testNumChapter($request['numChapter']);

            if ($test['COUNT(*)']!=1) {
                throw new \Exception('Le numéro de chapitre envoyé n\'existe pas.');
            }
            else {
            $numChapterforForm=$postManager->getNumChapter($request['numChapter']);  
            require('view/backend/commentAddFormView.php');  
            }
        }
        else {
            require('view/backend/commentAddFormView.php');
        }
    }


    public function addCommentAdm($request)
    {
        
        if (isset($request['numChapter']) && $request['numChapter'] > 0) {
            if (!empty($request['author']) && !empty($request['comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $addedCommentAdm = $commentManager->postCommentAdm($request['author'], $request['comment'], $request['numChapter']);
                if ($addedCommentAdm === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire !');
                }
                else {
                    header('Location: index.php?action=listCommentsAdm');
                }
            }
            else {
                throw new \Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new \Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    private function upload($file) 
    {
        // Let's test if the photo file has been sent and there is no error
        if (isset($file) AND $file['error'] == 0)
            
        {
            // Let's test if the file is less than 1.2 Mo
            if ($file['size'] <= 1200000)
            {
                    // Let's test if the extension is allowed and if the orientation is in landscape mode
                    $infosfichier = pathinfo($file['name']);
                    $extension_upload =strtolower(  $infosfichier['extension']);
                    $extensions_authorised = array('jpg', 'jpeg', 'gif', 'png');

                    $image = imagecreatefromstring(file_get_contents($file['tmp_name']));
                    $exif = exif_read_data($file['tmp_name']);
                    $ort = $exif['Orientation'] ?? null;
                    if (!in_array($extension_upload, $extensions_authorised))
                    {
                        throw new \Exception('Ce type de fichier n\'est pas autorisé (mauvaise extension).');
                    }

                    if ($exif['COMPUTED']['Height'] > $exif['COMPUTED']['Width']) 
                    {
                        throw new \Exception('L\'orientation de la photo doit être en paysage.');
                    }
                    if ($ort == 3) 
                    {
                        $image = imagerotate($image, 180, 0);
                    }

                    //The file can be validated and stored permanently 
                    $nom = md5(uniqid(rand(), true));
                    move_uploaded_file($file['tmp_name'], __DIR__ .'/../public/images/'. $nom);
                    return 'public/images/'. $nom;
                    
                    
            }
            else {
                throw new \Exception('La taille dépasse la limite autorisée de 1.2 Mo.');
            }
        }
    }

}