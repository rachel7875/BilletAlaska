<?php $title = "Modération de commentaire"; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Formulaire de modération <br/> de commentaire</h1>
            <h2>Chapitre <?= htmlspecialchars($commentToModify['numChapter']);?> - <?= htmlspecialchars($commentToModify['title']);?> </h2>
        </div>
    </div>  

    <section class="container">
        <div class="row">
            <div class="col-sm-12">

                <form class="well" action="index.php?action=rectifySaveComment&amp;commentId=<?= $request['commentId'] ?>" method="post">
                    <div class="form-group">
                        <label for="new_author">Nouveau nom de l'auteur</label><br />
                        <input type="text" id="new_author" value="<?= htmlspecialchars($commentToModify['author']);?> "  name="new_author" />
                    </div>
                    <div class="form-group">
                        <label for="new_comment">Nouveau contenu du commentaire</label><br />
                        <textarea id="new_comment"  name="new_comment" rows="8"  class="form-control"> <?= htmlspecialchars($commentToModify['comment']);?> </textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-lg btn-custom" type="submit" />
                    </div>
                </form>

            </div>
        </div>
    </section >

</div>  

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>