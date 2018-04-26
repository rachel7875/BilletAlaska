<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Liste des chapitres</h1>
<p>Retrouvez votre chapitre en cours !</p>


<?php
foreach ($posts as $data)
{
?>
    <div class="chapter">
        <h2> Chapitre <?= htmlspecialchars($data['id']) ?> : <?= htmlspecialchars($data['title']) ?> </h2>
        <p> <em>publié le <?= $data['creationDate_fr'] ?></em> </p>
        <p>
            <?= nl2br(htmlspecialchars($data['summary'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Accès au chapitre</a></em>
        </p>
    </div>
<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>