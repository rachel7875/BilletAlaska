<?php $title = "Ajout d'un commentaire"; ?>

<?php ob_start(); ?>
<h1>Formulaire de saisie du commentaire</h1>

<p><a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a></p>


<form action="index.php?action=addCommentAdm" method="post">
    <div>
        <label for="numChapter">Numéro du chapitre concerné</label><br />
        <input type="text" id="numChapter"   name="numChapter" />
    </div>
    <div>
        <label for="comment">Votre commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>

        <input type="hidden" name="author" value="Jean FORTEROCHE" />   

    <div>
        <input type="submit" value="Envoyer"/>
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>