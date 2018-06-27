<?php

namespace OpenClassrooms\Blog\Controller;

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


class FrontController {  

    public function home()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $photoFirstPost = $postManager->getFirstPost();
        $photoLastPost = $postManager->getNbLastPost();
        
        require('view/frontend/homeView.php');
    }

    public function listPosts()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $posts = $postManager->getPosts();

        require('view/frontend/listChaptersView.php');
    }

    public function post($request)
    {
        if (isset($request['id']) && $request['id'] > 0 ){
            $postManager = new \OpenClassrooms\Blog\Model\PostManager();
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

            $test = $postManager->testId($request['id']);

            if ($test['COUNT(*)']!=1) {
                throw new \Exception('L\'identifiant de billet envoyé n\'existe pas.');
            }
            $post = $postManager->getPost($request['id']);
            $comments = $commentManager->getComments($request['id']);
            $nbComments = $commentManager->getNbComments($request['id']);

            require('view/frontend/chapterView.php');
        }
        else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
    }

    public function reportComment($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
            $reportedComment = $commentManager->reportComment($request['id']); 
            $comment = $commentManager->getReportedComment($request['id']);
            header('Location: index.php?action=post&id=' . $comment['postId']);
        }
        else {
            throw new \Exception('Aucun identifiant de commentaire envoyé');
        }
    }

    public function addComment($request)
    {
        if (isset($request['id']) && $request['id'] > 0) {
            if (!empty($request['author']) && !empty($request['comment'])) {
                $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
                $affectedLines = $commentManager->postComment($request['id'], $request['author'], $request['comment']);
                if ($affectedLines === false) {
                    throw new \Exception('Impossible d\'ajouter le commentaire !');
                }
                else {
                    header('Location: index.php?action=post&id=' . $request['id']);
                }    
            } else {
            throw new \Exception('Tous les champs ne sont pas remplis !');
            }
        } else {
         throw new \Exception('Aucun identifiant de billet envoyé'); 
        }
    }

    public function nbLastPost()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $numLastPost = $postManager->getNbLastPost();
    
        header('Location: index.php?action=post&id=' . $numLastPost['id'] );
    }

    public function firstPost()
    {
        $postManager = new \OpenClassrooms\Blog\Model\PostManager();
        $numFirstPost = $postManager->getFirstPost();
    
        header('Location: index.php?action=post&id=' . $numFirstPost['id'] );
    }

    public function mentionsLegales()
    {
        require('view/frontend/mentionsLegalesView.php');
    }

    public function author()
    {
        require('view/frontend/authorView.php');
    }
    
    public function adminLoginForm()
    {
        require('view/frontend/adminLoginFormView.php');
    }
}