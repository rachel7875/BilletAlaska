<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class BackController { 

    
// public function __construct()
  //  {
  //      if (! isset($_SESSION['user'])) {
   //     throw new Exception('Non autorisé'); 
   //     }  
   // }
  

    public function viewPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $postAdm=$postManager->getPostAdm($request['id']);
            require('view/backend/postAdmView.php');
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }   
    }


    public function rectifyFormPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $postToModify=$postManager->getPostAdm($request['id']);
            require('view/backend/postRectifyFormView.php');
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    public function rectifyPost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) { 
            
            if (!empty($request['new_numChapter']) && !empty($request['new_title']) && !empty($request['new_content']) && !empty($request['new_summary'])) {
                $postManager = new \OpenClassrooms\Blog\Model\PostManager();
                $modifiedPost=$postManager->modifyPost($request['id'], $request['new_numChapter'], $request['new_title'], $request['new_content'], $request['new_summary']);
                if ($modifiedPost === false) {
                    throw new Exception('Impossible de modifier le chapitre !');
                }
                else {
                    header('Location: index.php?action=viewPostAdm&id=' . $request['id']);
                }
            }    
            else {
                throw new Exception('Tous les champs ne sont pas remplis  !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }        
    } 

    public function deletePost($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $deletedPost = $postManager->deletePost($request['id']);
            header('Location: index.php?action=administration');
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    public function addFormPost()
    {
        require('view/backend/chapterAddFormView.php');
    }

    public function addPost($request)
    {
        if (!empty($request['numChapter']) && !empty($request['title']) && !empty($request['summary']) && !empty($request['content'])) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $post = $postManager->sendPost($request['numChapter'], $request['title'], $request['content'], $request['summary']);
            if ($post === false) {
                throw new Exception('Impossible d\'ajouter le chapitre !');
            }
            else {
                header('Location: index.php?action=administration');
            }
        }
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
    }

    public function listsAdm()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

        $postsAdm = $postManager->getPostsAdm();
        $commentsAdm = $commentManager->getCommentsAdm();

        require('view/backend/homeAdmView.php');
    }

    public function moderateFormComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $commentToModify=$commentManager->getCommentAdm($request['commentId']);
            require('view/backend/commentModerateFormView.php');
         }
         else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function rectifyComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
           
            if (!empty($request['new_author']) && !empty($request['new_comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $modifiedComment = $commentManager->modifyComment($request['commentId'], $request['new_author'], $request['new_comment']);
                if ($modifiedComment === false) {
                    throw new Exception('Impossible de modifier le commentaire !');
                }
                else {
                    header('Location: index.php?action=administration');
                }
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis  !');
            }
        }
         else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }    
    } 

    public function deletePublicComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $deletedPublicComment = $commentManager->deletePublicComment($request['commentId']);
    
            header('Location: index.php?action=administration');
        }
        else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function restorePublicComment($request)
    {
        if (isset($request['commentId']) && $request['commentId'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $restoredPublicComment = $commentManager->restorePublicComment($request['commentId']);
            header('Location: index.php?action=administration');
        }
        else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function addFormComment()
    {
        require('view/backend/commentAddFormView.php');
    }

    public function addCommentAdm($request)
    {
        
        if (isset($request['numChapter']) && $request['numChapter'] > 0) {
            if (!empty($request['author']) && !empty($request['comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $addedCommentAdm = $commentManager->postCommentAdm($request['author'], $request['comment'], $request['numChapter']);
                if ($addedCommentAdm === false) {
                    throw new Exception('Impossible d\'ajouter le commentaire !');
                }
                else {
                    header('Location: index.php?action=administration');
                }
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

}