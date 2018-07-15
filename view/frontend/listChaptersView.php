<?php $title = 'Liste des chapitres de Billet simple pour l\'Alaska'; ?>
<?php $metaDescription ='Retrouvez les résumés et photos de chaque chapitre du dernier roman de Jean Forteroche pour vous donner envie de lire en ligne
les aventures de Lucas !' ?> 

<?php ob_start(); ?>

<div class="main_content">
    
    <div class="jumbotron text-center enteteBis">
        <div class="container">
            <h1>Liste des chapitres</h1>
            <p>Retrouvez tous les chapitres et leurs résumés</p>        
        </div>
    </div>  

    <ol class="container breadcrumb text-center">
        <li><a href="index.php">Accueil</a></li>
        <li class="active">Liste des chapitres</li>
    </ol>


    <section class="container">
        <?php
        foreach ($posts as $data)
        {
        ?>
            <div class="summarychapter row">

                
                        <div class="col-sm-5 "> 
                          <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><img src="<?= $data['photoLink']?>" class="img-responsive center-block"
                            alt="photo du chapitre <?= htmlspecialchars($data['numChapter']) ?> : <?= htmlspecialchars($data['title']) ?> de Billet simple pour l'Alaska"></a>
                        </div> 

                        <div class="col-sm-7">
                            <h2> Chapitre <?= htmlspecialchars($data['numChapter']) ?> : <?= htmlspecialchars($data['title']) ?> </h2>
                            <p> <em><span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?= $data['publicationDateSmall'] ?></em> </p>
                            <div class="summary">
                                <?= $data['summary']?>
                                <br />
                                <br />
                                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em>
                                <br />
                                <br />
                            </div>
                        </div>  
                         
            </div>

        <?php
        }
        ?>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>