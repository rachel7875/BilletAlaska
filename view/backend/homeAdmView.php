<?php $title = 'Billet simple pour l\'Alaska - Espace Administration : Accueil'; ?>

<?php ob_start(); ?>
<h1>Bienvenue dans l'espace d'administration</h1>
<p>Vous pouvez ajouter, modifier et supprimer les chapitres, mais aussi modérer un commentaire, voire le supprimer. </p>

<h2>Gestion des chapitres</h2>

<p><a href="index.php?action=addPost">Ajouter un chapitre</a> </p>

<?php
foreach ($postsAdm as $data)
{
?>
    <div class="chapter">
        <h3> Chapitre <?= htmlspecialchars($data['id']) ?> : <?= htmlspecialchars($data['title']) ?> </h3>
        <p> <em>Créé le : <?= $data['creationDate_fr'] ?></em> </p>
        <p> <em>Dernière modification le : <?= $data['modifDate_fr'] ?></em> </p>
        <p>
            <em><a href="index.php?action=viewPostAdm&amp;id=<?= $data['id'] ?>">Visualiser le chapitre</a></em>
            <em><a href="index.php?action=rectifyFormPost&amp;id=<?= $data['id'] ?>">Modifier le chapitre</a></em>
            <em><a href="index.php?action= ?>">Supprimer le chapitre</a></em>
            <br />
            <br />
        </p>
    </div>

<?php
}
?>



<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?> 