<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function home()
{
    require('view/frontend/homeView.php');
}

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listChaptersView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/chapterView.php');
}

function reportComment($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $reportedComment = $commentManager->reportComment($_GET['id']);

    $comment = $commentManager->getReportedComment($commentId);

    header('Location: index.php?action=post&id=' . $comment['postId']);
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function nbLastPost()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $numLastPost = $postManager->getNbLastPost();

    header('Location: index.php?action=post&id=' . $numLastPost['maxId'] );

}

function contact()
{

    require('view/frontend/contactView.php');
} 


function postMessage ($subject, $sender, $message_content)
{
    $contactManager = new \OpenClassrooms\Blog\Model\ContactManager();

    $affectedMessage= $contactManager->addMessage($subject, $sender, $message_content);

    if ($affectedMessage === false) {
        throw new Exception('Impossible d\'envoyer le message !');
    }
    else {
        header('Location: index.php');
    }
}

