<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Liste des chapitres</h1>
<p>Retrouvez tous les chapitres et leurs résumés
    <br/>
    <br/>
</p>


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
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
            <br />
            <br />
        </p>
    </div>
<?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>