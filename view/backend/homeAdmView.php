<?php $title = 'Billet simple pour l\'Alaska - Espace Administration : Accueil'; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Bienvenue dans <br />
            l'espace d'administration</h1>
        </div>
    </div>  

    <section class="container">
        <div class="row text-center">
            <div class="col-sm-5">
                <p>Vous pouvez ajouter, modifier <br />et supprimer les chapitres. </p>
                <a class="btn btn-customBis navbar-btn btn-block" href="index.php?action=listPostsAdm"><strong>Gestion des <br />CHAPITRES </strong></a>
            </div>
            <div class="col-sm-offset-1 col-sm-5">
                <p>Vous pouvez aussi ajouter ou modérer un commentaire, <br />le supprimer et le restaurer sur le site public. </p>
                <a class="btn btn-custom navbar-btn btn-block" href="index.php?action=listCommentsAdm"><strong>Gestion des <br />COMMENTAIRES </strong></a>
            </div>  
        </div> 
    </section > 
</div>         



<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?> 