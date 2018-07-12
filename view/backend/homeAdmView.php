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
        <div class="row ">
            <div class="col-sm-6 ">
                <div class="text-center dashboard">
                    <p><strong>Vous pouvez ajouter, modifier et supprimer les chapitres.</strong> </p>
                </div>
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10 ">
                        <a class="btn btn-customTer navbar-btn btn-block" href="index.php?action=listPostsAdm"><strong>Gestion des <br />CHAPITRES </strong></a>
                        <div class="panel panel-default stat">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Données sur les chapitres</h3>
                            </div>

                            <ul class=" list-group ">
                                <li class="list-group-item"><span class="badge "><?=$nbchapters['nbChapters'] ?> </span>Total</li>
                                <li class="list-group-item"><span class="badge"><?=$nbPublishedChapters['nbPublishedChapters']?></span>Publiés </li>
                                <li class="list-group-item"><span class="badge"><?=$nbChaptersPlannedPublication['nbChaptersPlannedPublication'] + 
                                $nbChaptersUnplannedPublication['nbChaptersUnplannedPublication'] ?></span>Non publiés 
                                    <ul >
                                        <li class="orange">Publication prévue <span class="badge pull-right orange_back"><?=$nbChaptersPlannedPublication['nbChaptersPlannedPublication'] ?></span></li>
                                        <li class="orange">Publication non prévue<span class="badge pull-right orange_back"><?=$nbChaptersUnplannedPublication['nbChaptersUnplannedPublication'] ?></span> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="col-sm-6">
                <div class="text-center dashboard">
                    <p><strong>Vous pouvez aussi ajouter ou modérer un commentaire, le supprimer et le restaurer sur le site public. </strong></p>
                </div> 
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-10 ">
                        <a class="btn btn-custom navbar-btn btn-block" href="index.php?action=listCommentsAdm"><strong>Gestion des <br />COMMENTAIRES </strong></a>
                        <div class="panel panel-default stat">
                            <div class="panel-heading ">
                                <h3 class="panel-title text-center">Données sur les commentaires</h3>
                            </div>

                            <ul class=" list-group ">
                                <li class="list-group-item"><span class="badge "><?= $nbCommentsAdm['nbCommentsAdm'] ?> </span>Total</li>
                                <li class="list-group-item"><span class="badge"><?=$nbVisibleComments['nbVisibleComments']  ?></span>Visibles sur le site public 
                                    <ul >
                                        <li>Selon leurs statuts :</li>
                                            <ul >
                                                <li class="orange">Signalés<span class="badge pull-right orange_back"><?=$nbVisibleReportedComments['nbVisibleReportedComments'] ?></span></li>
                                                <li>Originaux<span class="badge pull-right"><?=$nbVisibleOriginalComments['nbVisibleOriginalComments'] ?></span> </li>
                                                <li>Modérés<span class="badge pull-right"><?=$nbVisibleModeratedComments['nbVisibleModeratedComments'] ?></span> </li>
                                            </ul>
                                        <li>Selon leurs auteurs :</li>
                                            <ul >
                                                <li>J. Forteroche<span class="badge pull-right"><?=$nbVisibleAuthorComments ['nbVisibleAuthorComments'] ?></span></li>
                                                <li>Les visiteurs<span class="badge pull-right"><?=$nbVisibleComments['nbVisibleComments']-$nbVisibleAuthorComments ['nbVisibleAuthorComments']  ?></span> </li>
                                            </ul>
                                    </ul>
                                </li>
                                <li class="list-group-item"><span class="badge"><?=$nbCommentsAdm['nbCommentsAdm']-$nbVisibleComments['nbVisibleComments'] ?></span>Invisibles sur le site public </li>
                            </ul>
                        </div>
                    </div>
                </div>    
            </div>
        </div> 
    </section > 
</div>         



<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?> 