<?php $title = "Ajout d'un chapitre"; ?>

<?php ob_start(); ?>
<h1>Formulaire de saisie de nouveau chapitre</h1>

<p><a href="index.php?action=administration">Retour à l'accueil de l'espace administration</a></p>


<form action="index.php?action=addPost" method="post">
    <div>
        <label for="numChapter">Numéro du nouveau chapitre</label><br />
        <input type="text" id="numChapter"   name="numChapter" />
    </div>
    <div>
        <label for="title">Titre du nouveau chapitre</label><br />
        <input type="text" id="title"   name="title" />
    </div>
    <div>
        <label for="content">Contenu du nouveau chapitre</label><br />
        <textarea id="content"  name="content" rows="25" cols="135">  </textarea>
    </div>
    <div>
        <label for="summary">Résumé du nouveau chapitre</label><br />
        <textarea id="summary"  name="summary" rows="6" cols="135"> </textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>