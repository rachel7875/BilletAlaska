<?php $title = 'Erreur'; ?>
<?php $metaDescription ='Erreur' ?> 

<?php ob_start(); ?>

<div class="main_content" >

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1>Erreur</h1>        
        </div>
    </div>  

    <section class="container"  >
        <div class="row" >
            <div class="col-lg-12"  >
            
                <div class="jumbotron text-center " id="errorJumbo" >
                    
                        <div class="message">    
                            <p class="orange"><?= $message ?></p>
                        </div>
                        <div id="prevPageReturnBtn">  
                            <a href="#" onclick="history.go(-1);" class="btn btn-md btn-custom" role="button">Retour vers la page précédente</a></p>
                        </div>
                
                </div>
           
            </div>   
        </div>
    
    </section>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

