<?php $title = 'Erreur'; ?>
<?php $metaDescription ='Erreur' ?> 

<?php ob_start(); ?>

<div class="main_content" >

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1>Erreur</h1>        
        </div>
    </div>  

    <div class="container-fluid text-center"  >
        <section class="row">
            <div class="col-lg-offset-2 col-lg-8" id="errorJumbo">
                <div class="jumbotron text-center" id="error">
                    <div class="message">    
                        <p class="orange"><?= $message ?></p>
                    </div>
                    <div id="prevPageReturnBtn">  
                        <a href="#" onclick="history.go(-1);" class="btn btn-md btn-custom" role="button">Retour vers la page précédente</a></p>
                    </div>
                </div>
            </div>    
        </section>
    
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

