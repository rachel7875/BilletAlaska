<?php $title = "Ajout d'un commentaire par l'auteur"; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Formulaire de saisie <br />
            de commentaire</h1>
        </div>
    </div>  

    <section class="container">
        <div class="row">
            <div class="col-sm-12">

                <form class="well" action="index.php?action=addCommentAdm" method="post">
                    <div class="form-group">
                        <label for="numChapter">Numéro du chapitre concerné</label><br />   
                        <input type="number" min=1 id="numChapter" 
                        value="<?php if (!empty($numChapterforForm['numChapter'])){?><?=htmlspecialchars($numChapterforForm['numChapter']);}?>"  name="numChapter" />
                    </div>
                    <div class="form-group">
                        <label for="comment">Votre commentaire</label><br />
                        <textarea id="comment" name="comment" rows="8"  class="form-control"></textarea>
                    </div>

                        <input type="hidden" name="author" value="Jean FORTEROCHE" />   

                    <div class="form-group">
                        <input class="btn btn-lg btn-custom" type="submit" value="Envoyer"/>
                    </div>
                </form>

            </div>
        </div>
    </section >

</div>  

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>