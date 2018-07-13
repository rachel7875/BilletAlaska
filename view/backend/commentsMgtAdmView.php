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
                <p>L'ensemble des commentaires sont listés ci-dessous. Les commentaires apparaissant sur fond rouge clair  ne sont pas visibles sur le site web public. </p>
                <p> L'envoi d'un commentaire de votre part sur la page d'un chapitre s'effectue :</p>
                <ul>
                    <li>soit à partir d'un bouton figurant dans la liste des commentaires, </li>
                    <li>soit à partir du bouton ci-dessous. </li>
                </ul> 
    
                <p><a class="btn btn-customTer" href="index.php?action=addFormComment"><strong>
                    <span class="glyphicon glyphicon-pencil big"></span>Envoyer un commentaire</strong></a></p>
            
                <table class="table table-bordered table-striped text-center" id="commentTable">
                    <tr>
                        <th class="text-center" >Chapitre concerné</th>
                        <th class="text-center">Auteur</th>
                        <th class="text-center">Date de création</th>
                        <th class="text-center">Statut</th>
                        <th class="text-center">Date de modération</th>
                        <th class="text-center">Texte du commentaire</th>
                        <th class="text-center">Actions possibles</th>
                    </tr>    
                    <?php
                    foreach ($commentsAdm as $data)
                    {
                    ?>
                   
                    <tr class="<?= ($data['visibility']==0)?'danger':' ' ?>" >
                       
               
                        <td><em>chapitre <?= htmlspecialchars($data['numChapter']) ?> - <?= htmlspecialchars($data['title']) ?> </em> </td>
                        <td><em><?= htmlspecialchars($data['author']) ?></em> </td>
                        <td><em><?= $data['commentDate_fr'] ?></em> </td>
                        <td class="<?= ($data['stage']=="signalé")?'orange':' ' ?>" ><em> <?= htmlspecialchars($data['stage']) ?></em> </td>
                        <td><em><?php if ($data['stage']=="modéré"){?> <?= $data['moderationDate_fr']; }?></em> </td>
                        <td class="<?= ($data['stage']=="signalé")?'orange':' ' ?>" ><em><?= nl2br(htmlspecialchars($data['comment'])) ?></em> </td>
                        <td id="actions"><em><a class="<?= ($data['visibility']==0)?'hidden':'' ?>" 
                            href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>">Modérer</a></em> 
                            <em><a class="<?php if ($data['visibility']==0){?>hidden<?php }?>" 
                            data-toggle="tooltip" href="index.php?action=deletePublicComment&amp;commentId=<?= $data['commentId'] ?>" title="Effacer du site web public">* Effacer</a></em> 
                            <em><a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                            data-toggle="tooltip" href="index.php?action=restorePublicComment&amp;commentId=<?= $data['commentId'] ?>" title="Restaurer sur le site web public">* Restaurer</a></em> 
                            <em><a class="<?php if ($data['visibility']==1){?>hidden<?php }?>"
                            data-toggle="tooltip" href="index.php?action=moderateFormComment&amp;commentId=<?= $data['commentId'] ?>" title="Modérer et Restaurer sur le site web public">* Modérer et Restaurer</a></em> 
                            <em><a class="<?php if ($data['visibility']==0){?>hidden<?php }?>"
                            data-toggle="tooltip" href="index.php?action=addFormComment&amp;numChapter=<?= $data['numChapter'] ?>" title="Envoyer votre commentaire pour ce chapitre">* Envoyer votre commentaire </a></em> </td>
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