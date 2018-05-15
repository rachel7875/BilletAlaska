<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


function listPostsAdm()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $postsAdm = $postManager->getPostsAdm();

    require('view/backend/homeAdmView.php');
}


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

function rectifyPost($id, $new_title,$new_content, $new_summary)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $modifiedPost=$postManager->modifyPost($id, $new_title,$new_content, $new_summary);

    if ($modifiedPost === false) {
        throw new Exception('Impossible de modifier le chapitre !');
    }
    else {
        header('Location: index.php?action=viewPostAdm&id=' . $id);
    }
}    

