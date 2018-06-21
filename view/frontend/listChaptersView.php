<?php $title = 'Liste des chapitres'; ?>
<?php $metaDescription ='Liste des chapitres du dernier roman en ligne de Jean Forteroche Billet simple pour l\'Alaska' ?> 

<?php ob_start(); ?>

<div class="main_content">
    
    <div class="jumbotron text-center entete">
        <div class="container">
            <h1>Liste des chapitres</h1>
            <p>Retrouvez tous les chapitres et leurs résumés
                <br/>
                <br/>
            </p>        
        </div>
    </div>  


    <section class="container">
        <?php
        foreach ($posts as $data)
        {
        ?>
            <div class="summarychapter row">

                
                        <div class="col-sm-5 text-center"> 
                            <img src="<?= $data['photoLink']?> " alt="photo du chapitre correspondant" width="310" height="190">
                        </div> 

                        <div class="col-sm-7">
                            <h2> Chapitre <?= htmlspecialchars($data['numChapter']) ?> : <?= htmlspecialchars($data['title']) ?> </h2>
                            <p> <em><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $data['creationDate_fr'] ?></em> </p>
                            <p>
                                <?= nl2br(htmlspecialchars($data['summary'])) ?>
                                <br />
                                <br />
                                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                                <br />
                                <br />
                            </p>
                        </div>  
                         
            </div>

        <?php
        }
        ?>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>