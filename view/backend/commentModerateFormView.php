<?php $title = "Modération de commentaire"; ?>

<?php ob_start(); ?>
<h1>Formulaire de modération de commentaire</h1>

<p><a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a></p>

<h2>Commentaire à modifier relatif au chapitre <?= htmlspecialchars($commentToModify['numChapter']);?> - <?= htmlspecialchars($commentToModify['title']);?> </h2>

<form action="index.php?action=rectifySaveComment&amp;commentId=<?= $request['commentId'] ?>" method="post">
    <div>
        <label for="new_author">Nouveau nom de l'auteur</label><br />
        <input type="text" id="new_author" value="<?= htmlspecialchars($commentToModify['author']);?> "  name="new_author" />
    </div>
    <div>
        <label for="new_comment">Nouveau contenu du commentaire</label><br />
        <textarea id="new_comment"  name="new_comment" rows="8" cols="135"> <?= htmlspecialchars($commentToModify['comment']);?> </textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>