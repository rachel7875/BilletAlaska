<?php $title = 'Billet simple pour l\'Alaska - Chapitre ' . htmlspecialchars($post['numChapter']) ; ?>
<?php $metaDescription = htmlspecialchars($post['title']) . ': ' . strstr ('">', ' ', strip_tags($post['summary']))  ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center enteteBis" >
        <div class="container">
            <h1>Chapitre <?= htmlspecialchars($post['numChapter']) ?>  <br/>
            <?= htmlspecialchars($post['title']) ?> </h1>
        </div>
    </div>  

    <ol class="container breadcrumb text-center">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php?action=listChapters">Liste des chapitres</a></li>
        <li class="active">Chapitre <?= htmlspecialchars($post['numChapter']) ?> </li>
    </ol>

    <section class="container" id="sectionChapterPage">
        <div class="row">
    
            <aside class="public_aside col-sm-12 text-center " >
                <div class="row">
                    <div class="col-sm-12 " >
                        <p>
                            <strong><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Publié le <?= $post['publicationDateSmall'] ?></strong> <br/>
                            <?= $nbComments['nbComments'] ?> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        </p>
   
                        <div class="row">
                            <div class="col-sm-12">   
                                <img src="<?= $post['photoLink']?> " 
                                alt="Photo du chapitre <?= htmlspecialchars($post['numChapter']) ?> <?= htmlspecialchars($post['title']) ?> du roman Billet simple pour l'Alaska" class="img-responsive center-block">
                            </div>
                        </div>    
                       
                    </div>
                </div> 
            </aside>

            <article class="col-sm-12 " >
                <div class="text-justify">            
                    <p>
                        <?=$post['content']?>
                    </p>
                    <ul class="pager ">
                        <li class="<?= (empty($previousNumChapter))?'hidden':'previous'?>"><a href="index.php?action=post&amp;id=<?= $previousPost['id']?>">
                        <span class="glyphicon glyphicon-backward"></span> Chapitre précédent </a></li>
                        <li class="<?= (empty($nextNumChapter))?'hidden':'next'?>"><a href="index.php?action=post&amp;id=<?= $nextPost['id'] ?>"> 
                        Chapitre suivant <span class="glyphicon glyphicon-forward"></span></a></li>
                    </ul>
                    
                     
                </div>

                <div class="chaptercomments row"> 
                    <h2 class="col-sm-12 ">Commentaires </h2> 
                    
                    <div class="formulaire col-sm-6 "> 
                    
                        <h3>Ajoutez un commentaire ! </h3>
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                            <div class="form-group">
                                <label for="author">Votre pseudo</label>
                                <input type="text" id="author" name="author" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="comment">Votre commentaire</label>
                                <textarea id="comment" name="comment" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-custom" type="submit">Envoyer</button>
                                <br />
                            </div>
                        </form>
                    </div>
                    
                    <div id="comments_list" class="col-sm-12 ">
                        <h3><?= $nbComments['nbComments'] ?> <span class="glyphicon glyphicon-comment" aria-hidden="true"></span></h3>
                        <?php
                        foreach ($comments as $data)
                        {
                            ?>
                            <div class="comment">
                                <p class="light_red "> <strong ><?= htmlspecialchars($data['author']) ?></strong> - <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $data['commentDate_fr'] ?> </p>
                                <p> <?= nl2br(htmlspecialchars($data['comment'])) ?> </p>
                                <p> <?php if($data['stage']=="modéré"){?><em>Modéré par l'auteur    -   </em><?php }
                                            if($data['stage']=="signalé") 
                                            {?><em>Déjà signalé   </em><?php } 
                                            else { ?>  <em><a href="index.php?action=reportComment&amp;commentId=<?= $data['commentId'] ?>" onclick="alert('Vous avez signalé ce commentaire.'); "> 
                                                    <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Signaler</a></em><?php }?> 
                                            
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </article>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
