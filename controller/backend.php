<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function viewPost($id)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $postAdm=$postManager->getPostAdm($id);

    require('view/backend/postAdmView.php');
}

function rectifyFormPost($id)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $postToModify=$postManager->getPostAdm($id);

    require('view/backend/postRectifyFormView.php');
}

function rectifyPost($id, $new_numChapter, $new_title,$new_content, $new_summary)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $modifiedPost=$postManager->modifyPost($id, $new_numChapter, $new_title, $new_content, $new_summary);

    if ($modifiedPost === false) {
        throw new Exception('Impossible de modifier le chapitre !');
    }
    else {
        header('Location: index.php?action=viewPostAdm&id=' . $id);
    }
} 

function deletePost($id)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $deletedPost = $postManager->deletePost($id);

    header('Location: index.php?action=administration');
}

function addFormPost()
{
    require('view/backend/chapterAddFormView.php');
}

function addPost($numChapter, $title, $content, $summary)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $post = $postManager->sendPost($numChapter, $title, $content, $summary);

    if ($post === false) {
        throw new Exception('Impossible d\'ajouter le chapitre !');
    }
    else {
        header('Location: index.php?action=administration');
    }
}

function listsAdm()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $postsAdm = $postManager->getPostsAdm();
    $commentsAdm = $commentManager->getCommentsAdm();

    require('view/backend/homeAdmView.php');
}

function moderateFormComment($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $commentToModify=$commentManager->getCommentAdm($commentId);

    require('view/backend/commentModerateFormView.php');
}

function rectifyComment($commentId, $new_author, $new_comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $modifiedComment = $commentManager->modifyComment($commentId, $new_author, $new_comment);

    if ($modifiedComment === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=administration');
    }
} 

function deletePublicComment($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $deletedPublicComment = $commentManager->deletePublicComment($commentId);

    header('Location: index.php?action=administration');
}

function restorePublicComment($commentId)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $restoredPublicComment = $commentManager->restorePublicComment($commentId);

    header('Location: index.php?action=administration');
}