<?php $title = htmlspecialchars($post['title']); ?>
<?php $metaDescription ='Chapitre ' . htmlspecialchars($post['numChapter']) . ': ' . htmlspecialchars($post['title']) . 'de Billet simple pour l\'Alaska'  ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1>Chapitre <?= htmlspecialchars($post['numChapter']) ?>  <br/>
            <?= htmlspecialchars($post['title']) ?> </h1>
        </div>
    </div>  

    <section class="container-fluid">
        <div class="row">
    
            <aside class="public_aside col-sm-3 text-center " >
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 " >
                        <p>
                        <em><strong><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Publié le <?= $post['creationDate_fr'] ?></strong></em> </br>
                       
                        <?= $nbComments['nbComments'] ?> <span class="glyphicon glyphicon-comment" aria-hidden="true">
                        </p>
                        <div class="row">
                            <div class="col-sm-12">   
                                <img src="public/images/alaska.jpg" class="img-responsive">
                            </div>
                        </div>    
                       
                        <p><a href="index.php?action=listChapters">Retour à la liste des chapitres</a></p>
                    </div>
                </div> 
            </aside>

            <article class="col-sm-7 " >
                <div class="text-justify">            
                    <p>
                        <?= nl2br(htmlspecialchars($post['content'])) ?>
                    </p>
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
                                <p> <strong><?= htmlspecialchars($data['author']) ?></strong> - <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $data['commentDate_fr'] ?> </p>

                                <p> <?= nl2br(htmlspecialchars($data['comment'])) ?> </p>
                                <p> <em><a href="index.php?action=reportComment&amp;id=<?= $data['commentId'] ?>"> <span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Signaler</a></em>  </p>

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
