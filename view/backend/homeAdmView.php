<?php $title = 'Billet simple pour l\'Alaska - Espace Administration : Accueil'; ?>

<?php ob_start(); ?>
<h1>Bienvenue dans l'espace d'administration</h1>
<p>Vous pouvez ajouter, modifier et supprimer les chapitres, mais aussi modérer un commentaire, voire le supprimer. </p>

<h2>Gestion des chapitres</h2>

<p><a href="index.php?action=addFormPost">Ajouter un chapitre</a> </p>

<?php
foreach ($postsAdm as $data)
{
?>
    <div class="chapter">
        <h3> Chapitre <?= htmlspecialchars($data['numChapter']) ?> : <?= htmlspecialchars($data['title']) ?> </h3>
        <p> <em>Créé le : <?= $data['creationDate_fr'] ?></em> </p>
        <p> <em>Dernière modification le : <?= $data['modifDate_fr'] ?></em> </p>
        <p>
            <em><a href="index.php?action=viewPostAdm&amp;id=<?= $data['id'] ?>">Visualiser le chapitre</a></em>
            <em><a href="index.php?action=rectifyFormPost&amp;id=<?= $data['id'] ?>">Modifier le chapitre</a></em>
            <em><a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">Supprimer le chapitre</a></em>
            <br />
            <br />
        </p>
    </div>

<?php
}
?>

<h2>Gestion des commentaires</h2>

  <p> Vous pouvez gérer les commentaires postés par les internautes. Vous avez plusieurs possibilités : modérer, effacer du site web public, restaurer après avoir éventuellement modérer. <br/>
  L'ensemble des commentaires sont listés ci-dessous. Les commentaires apparaissant en gris ne sont pas visibles sur le site web public. </p>
  <P> Vous pouvez également envoyer un commentaire sur la page d'un chapitre, soit à partir du bouton ci-dessous, soit à partir d'un bouton figurant dans la liste des commentaires. </p>
  <p>
            <em>
                <a href="index.php?action=addFormComment">Envoyer un commentaire</a>
<?php
foreach ($commentsAdm as $data)
{
?>
    <div class="<?= ($data['visibility']==0)?'grey':'' ?>" >
        <h3> Commentaire :  </h3>
        
        <p> <em>Chapitre concerné : chapitre <?= htmlspecialchars($data['numChapter']) ?> - <?= htmlspecialchars($data['title']) ?> </em> </p>
        <p> <em>Auteur : <?= htmlspecialchars($data['author']) ?></em> </p>
        <p> <em>Date de création du commentaire : <?= $data['commentDate_fr'] ?></em> </p>
        <p> <em>Statut : <?= htmlspecialchars($data['stage']) ?></em> </p>
        <p> <em><?php if ($data['stage']=="modéré"){?>Date de modération : <?= $data['moderationDate_fr']; }?></em> </p>

        <p> <em>Texte du commentaire : <?= nl2br(htmlspecialchars($data['comment'])) ?></em> </p>
        <p>
            <em>
                <a class="<?= ($data['stage']=="modéré" OR $data['visibility']==0)?'hidden':'' ?>" 
                href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>">Modérer le commentaire</a>
            </em>
            <em>
                <a class="<?php if ($data['visibility']==0){?>hidden<?php }?>" 
                href="index.php?action=deletePublicComment&amp;commentId=<?= $data['commentId'] ?>">Effacer le commentaire du site web public</a>
            </em>
            <em>
                <a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                href="index.php?action=restorePublicComment&amp;commentId=<?= $data['commentId'] ?>">Restaurer le commentaire sur le site web public</a>
            </em>
            <em>
                <a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>">Modérer et Restaurer le commentaire sur le site web public</a>
            </em>
            <br />
        </p>
    </div>

<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?> 