<?php
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listChapters') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                reportComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'nbLastPost') {
            nbLastPost();
        }

        elseif ($_GET['action'] == 'administration') {
            listPostsAdm();
        }

        elseif ($_GET['action'] == 'rectifyFormPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                rectifyFormPost($_GET['id']);
             }
             else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }    

        elseif ($_GET['action'] == 'viewPostAdm') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                viewPost($_GET['id']);
             }
             else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }    

        elseif ($_GET['action'] == 'rectifySavePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
               
                if (!empty($_POST['new_title']) && !empty($_POST['new_content']) && !empty($_POST['new_summary'])) {
                    rectifyPost($_GET['id'], $_POST['new_title'], $_POST['new_content'], $_POST['new_summary']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis  !');
                }
            }
             else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }   
 
    }
   
     
        
        else {
        home();
        }
}
catch(Exception $e) {
 echo 'Erreur : ' . $e->getMessage();
}
