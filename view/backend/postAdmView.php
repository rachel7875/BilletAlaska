<?php $title = "Visualisation du chapitre"; ?>

<?php ob_start(); ?>
<h1>Visualisation de chapitre</h1>

<p><a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a></p>


    <div class="chapterAdm">
        <h2> Chapitre <?= htmlspecialchars($postAdm['numChapter']) ?> : <?= htmlspecialchars($postAdm['title']) ?> </h2>
        <p> <em>Créé le : <?= $postAdm['creationDate_fr'] ?></em> </p>
        <p> <em>Dernière modification le : <?= $postAdm['modifDate_fr'] ?></em> </p>
        <p>
            <em><a href="index.php?action=rectifyFormPost&amp;id=<?= $postAdm['id'] ?>">Modifier le chapitre</a></em>
            <em><a href="index.php?action= ?>">Supprimer le chapitre</a></em>
            <br />
            <br />
        </p>
        <h3> Résumé du chapitre </h3>
        <p>
        <?= nl2br(htmlspecialchars($postAdm['summary'])) ?>
            <br />
        </p>
        <h3> Contenu du chapitre </h3>
        <p>
        <?= nl2br(htmlspecialchars($postAdm['content'])) ?>
            <br />
        </p>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>