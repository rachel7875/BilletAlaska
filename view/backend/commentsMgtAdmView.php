<?php $title = 'Billet simple pour l\'Alaska - Espace Administration : Accueil'; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Gestion des commentaires</h1>
        </div>
    </div>  

    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">

                <p>Sur cette page, un clic sur le bouton adéquat vous permettra de  gérer les commentaires postés par les internautes et d'envoyer vous-même un commentaire. </p>
                <p>Concernant les commentaires envoyés par les visiteurs, vous avez plusieurs possibilités : 
                <ul>
                    <li>les modérer,</li>
                    <li>les effacer du site web public,</li>
                    <li>les restaurer après les avoir éventuellement modérés. </li>
                </ul> 
                </p>   
                <p>L'ensemble des commentaires sont listés ci-dessous. Les commentaires apparaissant en rouge vif ne sont pas visibles sur le site web public. </p>
                <p> L'envoi d'un commentaire de votre part sur la page d'un chapitre s'effectue :</p>
                <ul>
                    <li>soit à partir d'un bouton figurant dans la liste des commentaires, </li>
                    <li>soit à partir du bouton ci-dessous. </li>
                </ul> 
    
                <p><a class="btn btn-customBis navbar-btn " href="index.php?action=addFormComment"><strong>
                    <span class="glyphicon glyphicon-pencil big"></span>Envoyer un commentaire</strong></a></p>
            
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <th class="text-center" >Chapitre concerné</th>
                        <th class="text-center">Auteur</th>
                        <th class="text-center">Date de création</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Date de modération</th>
                        <th class="text-center">Texte du commentaire </th>
                        <th class="text-center">Modérer le commentaire</th>
                        <th class="text-center"> Effacer le commentaire du site web public </th>
                        <th class="text-center">Restaurer le commentaire sur le site web public </th>
                        <th class="text-center">Modérer et Restaurer sur le site web public </th>
                        <th class="text-center">Envoyer votre commentaire pour ce chapitre </th>
                    </tr>    
                    <?php
                    foreach ($commentsAdm as $data)
                    {
                    ?>
                    
                    <tr class="<?= ($data['visibility']==0)?'red':'' ?>" >
                        <td><em>chapitre <?= htmlspecialchars($data['numChapter']) ?> - <?= htmlspecialchars($data['title']) ?> </em> </td>
                        <td><em><?= htmlspecialchars($data['author']) ?></em> </td>
                        <td><em><?= $data['commentDate_fr'] ?></em> </td>
                        <td><em> <?= htmlspecialchars($data['stage']) ?></em> </td>
                        <td><em><?php if ($data['stage']=="modéré"){?> <?= $data['moderationDate_fr']; }?></em> </td>
                        <td><em><?= nl2br(htmlspecialchars($data['comment'])) ?></em> </td>
                        <td><em><a class="<?= ($data['stage']=="modéré" OR $data['visibility']==0)?'hidden':'' ?>" 
                            href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>">Modérer</a></em> </td>
                        <td><em><a class="<?php if ($data['visibility']==0){?>hidden<?php }?>" 
                            href="index.php?action=deletePublicComment&amp;commentId=<?= $data['commentId'] ?>">Effacer</a></em> </td>
                        <td><em><a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                            href="index.php?action=restorePublicComment&amp;commentId=<?= $data['commentId'] ?>">Restaurer</a></em> </td>
                        <td><em><a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                            href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>">Modérer et Restaurer</a></em> </td>
                        <td><em><a class="<?php if ($data['visibility']==0){?>hidden<?php }?>"
                            href="index.php?action= ?>">Envoyer votre commentaire </a></em> </td>
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