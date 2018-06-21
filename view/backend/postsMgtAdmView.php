<?php $title = 'Billet simple pour l\'Alaska - Espace Administration : Accueil'; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Gestion des chapitres</h1>
        </div>
    </div>  

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <p>Sur cette page, un clic sur le bouton approprié vous permettra :  </p>
                <ul >
                    <li>d'accéder à un formulaire de saisie de nouveau chapitre </li>
                    <li>d'ouvrir un formulaire de modification de chapitre</li>
                    <li>de supprimer le chapitre </li>
                </ul>

                        
                <p><a class="btn btn-customTer" href="index.php?action=addFormPost"><strong><span class="glyphicon glyphicon-pencil big"></span>Ajouter un chapitre</strong></a></p>

                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <th class="text-center" >Numéro et Titre du chapitre</th>
                        <th class="text-center">Date de création :</th>
                        <th class="text-center">Dernière modification : </th>
                        <th class="text-center">Date de publication : </th>
                        <th class="text-center">Visualiser le chapitre</th>
                        <th class="text-center">Modifier le chapitre</th>
                        <th class="text-center">Supprimer le chapitre</th>
                    </tr>
                    <?php
                    foreach ($postsAdm as $data)
                    {
                    ?>
                    <tr>
                        <td class="redCustom">Chapitre <?= htmlspecialchars($data['numChapter']) ?> :<br/> <?= htmlspecialchars($data['title']) ?></td>
                        <td> <em><?= $data['creationDate_fr'] ?></em> </td>
                        <td> <em> <?= $data['modifDate_fr'] ?></em> </td>
                        <td> <em> <?= $data['publicationDate_fr'] ?></em> </td>
                        <td ><em><a  href="index.php?action=viewPostAdm&amp;id=<?= $data['id'] ?>"><span class="glyphicon glyphicon-eye-open big"></span></</a></em></td>
                        <td ><em><a href="index.php?action=rectifyFormPost&amp;id=<?= $data['id'] ?>"><span class="glyphicon glyphicon-pencil big"></span></a></em></td>
                        <td ><em><a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>">
                        <span class="glyphicon glyphicon-remove-sign big"></span></a></em></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>  
    </section>
</div> 


<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?> 