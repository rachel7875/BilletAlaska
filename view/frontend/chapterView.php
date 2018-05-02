<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Chapitre <?= htmlspecialchars($post['id']) ?> : <?= htmlspecialchars($post['title']) ?> </h1>
<p><a href="index.php?action=listChapters">Retour à la liste des chapitres</a></p>

<div class="wholechapter">
    <h3>
        <em>le <?= $post['creationDate_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>


<h2>Commentaires </h2>

<?php
foreach ($comments as $data)
{
?>
    <div class="comment">
        <p> <strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['commentDate_fr'] ?> </p>

        <p> <?= nl2br(htmlspecialchars($data['comment'])) ?> </p>
        <p> <em><a href="index.php?action=reportComment&amp;id=<?= $data['commentId'] ?>">Report</a></em></p>
        
    </div>
<?php
}
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
