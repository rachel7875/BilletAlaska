<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1>Chapitre <?= htmlspecialchars($post['numChapter']) ?>  <br/>
            <?= htmlspecialchars($post['title']) ?> </h1>
        </div>
    </div>  

    <div class="container">
    
        

        <section class="wholechapter text-justify">
            <p>
                <em><strong>le <?= $post['creationDate_fr'] ?></strong></em>
            </p>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </section>

        <section>
            <p><a href="index.php?action=listChapters">Retour à la liste des chapitres</a></p>
           
        </section>

        <section class="chaptercomments row"> 
            <h2 class="col-sm-12 "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?= $nbComments['nbComments'] ?> Commentaires </h2>
            
            <div class="formulaire col-sm-12 "> 
              
                <p><strong>Ajoutez un commentaire ! </strong></p>
                <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                    <div>
                        <label for="author">Votre pseudo</label><br />
                        <input type="text" id="author" name="author" />
                    </div>
                    <div>
                        <label for="comment">Votre commentaire</label><br />
                        <textarea id="comment" name="comment" rows="8" cols="45"></textarea>
                    </div>
                    <div>
                        <input class="btn btn-custom" type="button" value="Envoyer"/><br />
                        <br />
                    </div>
                </form>
            </div>
                
            <div id="comments_list" class="col-sm-12 ">
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
         

        </section>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
