<?php $title = "Visualisation du chapitre"; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Visualisation de chapitre</h1>
            <h2 class="jumbotron_adm"> Chapitre <?= htmlspecialchars($postAdm['numChapter']) ?> : <?= htmlspecialchars($postAdm['title']) ?> </h2>
        </div>
    </div>  

    <section class="container-fluid">

        <div class="chapterAdm row">
            <aside  class="adm_aside col-sm-3 text-center ">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 " >
                        
                        <p> <em><strong><span class="glyphicon glyphicon-time" aria-hidden="true"></span></em></strong> <br />
                        <em>Créé le : <?= $postAdm['creationDate_fr'] ?></em> </p>
                        <p> <em>Dernière modification le : <?= $postAdm['modifDate_fr'] ?></em> </p>
                        <p>
                            <em><a href="index.php?action=rectifyFormPost&amp;id=<?= $postAdm['id'] ?>">Modifier le chapitre</a></em>
                            <em><a href="index.php?action= ?>">Supprimer le chapitre</a></em>
                            <br />
                            <a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a>
                            <br />
                        </p>

                        <div class="row">
                            <div class="col-sm-12">   
                                    <img src="<?= $postAdm['photoLink'] ?>" class="img-responsive">
                            </div>
                        </div> 
                    
                        <div class="resume">
                            <h3> Résumé du chapitre </h3>
                            <p>
                            <?= nl2br(htmlspecialchars($postAdm['summary'])) ?>
                                <br />
                            </p>
                        </div>
                    </div>    
                </div>
            </aside>

            <article class="col-sm-7 " >
                <div class="wholechapter  text-justify"> 
                    <h3> Contenu du chapitre </h3>           
                    <p>
                    <?= nl2br(htmlspecialchars($postAdm['content'])) ?>
                        <br />
                    </p>
                </div>
            </article>        
        </div>
    </section>
</div> 
     
    


<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>