<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class FrontController {  

    public function home()
    {
        require('view/frontend/homeView.php');
    }

    public function listPosts()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $posts = $postManager->getPosts();

        require('view/frontend/listChaptersView.php');
    }

    public function post()
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

            $post = $postManager->getPost($request['id']);
            $comments = $commentManager->getComments($request['id']);

            require('view/frontend/chapterView.php');
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    public function reportComment($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $reportedComment = $commentManager->reportComment($_GET['id']); 
            $comment = $commentManager->getReportedComment($_GET['id']);
            header('Location: index.php?action=post&id=' . $comment['postId']);
        }
        else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function addComment($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            if (!empty($request['author']) && !empty($request['comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $affectedLines = $commentManager->postComment($request['id'], $request['author'], $request['comment']);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter le commentaire !');
                }
                else {
                    header('Location: index.php?action=post&id=' . $request['id']);
                }    
            } else {
            throw new Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
         throw new Exception('Aucun identifiant de billet envoyé'); 
        }
    }

    public function nbLastPost()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $numLastPost = $postManager->getNbLastPost();
    
        header('Location: index.php?action=post&id=' . $numLastPost['maxId'] );
    }

    public function mentionsLegales()
    {
        require('view/frontend/mentionsLegalesView.php');
    }

}