<?php $title = "Modification du chapitre"; ?>

<?php ob_start(); ?>
<h1>Formulaire de modification de chapitre</h1>

<p><a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a></p>

<h2>Chapitre à modifier : chapitre <?= htmlspecialchars($postToModify['numChapter']) ;?> </h2>

<form action="index.php?action=rectifySavePost&amp;id=<?= $id ?>" method="post">
    <div>
        <label for="new_numChapter">Nouveau numéro de chapitre</label><br />
        <input type="text" id="new_numChapter" value="<?= htmlspecialchars($postToModify['numChapter']);?> "  name="new_numChapter" />
    </div>
    <div>
        <label for="new_title">Nouveau titre de chapitre</label><br />
        <input type="text" id="new_title" value="<?= htmlspecialchars($postToModify['title']);?> "  name="new_title" />
    </div>
    <div>
        <label for="new_content">Nouveau contenu du chapitre</label><br />
        <textarea id="new_content"  name="new_content" rows="25" cols="135"> <?= htmlspecialchars($postToModify['content']);?> </textarea>
    </div>
    <div>
        <label for="new_summary">Nouveau résumé du chapitre</label><br />
        <textarea id="new_summary"  name="new_summary" rows="6" cols="135"> <?= htmlspecialchars($postToModify['summary']);?> </textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>