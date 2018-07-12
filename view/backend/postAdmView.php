<?php $title = "Visualisation du chapitre"; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Visualisation de chapitre</h1>
            <h2 class="jumbotron_adm"> Chapitre <?= htmlspecialchars($postAdm['numChapter']) ?> : <?= htmlspecialchars($postAdm['title']) ?> </h2>
        </div>
    </div>  

    <section class="container" id="chapterAdmSection">

        <div class="chapterAdm row">
            <aside  class="adm_aside col-sm-12  ">

                    <div class="text-center">    
                        <p> <strong><span class="glyphicon glyphicon-time" aria-hidden="true"></span></strong> <br />
                        <em>Créé le : <?= htmlspecialchars($postAdm['creationDate_fr'])?></em> </p>
                        <p> <em>Dernière modification le : <?= htmlspecialchars($postAdm['modifDate_fr'])?></em> </p>
                        <p> <em>Date de publication : <?= htmlspecialchars($postAdm['publicationDateSmall_fr']) ?></em> </p>
                        <p>
                            <em><a class="btn btn-sm btn-customTer" href="index.php?action=rectifyFormPost&amp;id=<?= $postAdm['id'] ?>">
                            <span class="glyphicon glyphicon-pencil"></span> Modifier le chapitre</a></em>   
                            <em><a class="btn btn-sm btn-custom" href="index.php?action=deletePost&amp;id=<?= $postAdm['id'] ?>">
                            <span class="glyphicon glyphicon-remove-sign"></span> Supprimer le chapitre</a></em>
                        </p>
                      
                        <div class="row">
                            <div class="col-sm-12">   
                                <img src="<?= $postAdm['photoLink'] ?>" class="img-responsive center-block">
                            </div>
                            <div class="col-sm-offset-1 col-sm-10 " >
                                <div class="<?= (!empty($message))?' ':'hidden' ?>" >
                                    <div class="alert alert-warning ">
                                        <h4>Echec de chargement</h4>
                                        <strong><?php  if (!empty($message)){?><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>  
                                        <?=$message;}?></strong>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                    </div>
                    
                        <div class="resume text-justify">
                            <h3  > Résumé du chapitre </h3>
                            <p>
                            <?= $postAdm['summary'] ?>
                                <br />
                            </p>
                        </div>
     
            </aside>

            <article class="col-sm-12 " >
                <div class="wholechapter  text-justify"> 
                    <h3 > Contenu du chapitre </h3>           
                    <p>
                    <?= $postAdm['content'] ?>
                        <br />
                    </p>
                </div>
            </article>        
        </div>
    </section>
</div> 
     
    


<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>