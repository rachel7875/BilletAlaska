<?php $title = "Accès à l'interface d'administration"; ?>
<?php $metaDescription ='Page de connexion' ?> 

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Formulaire de connexion<br />
            à l'espace d'administration</h1>
        </div>
    </div>  

    <section class="container" id="sectionPageLog">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <div class="orange text-center" id="message" >
                    <p ><strong><?php if (!empty($message)){?><?=$message;}?></strong></p>
                </div>
           
                <form class="well text-center" action="index.php?action=login" method="post">
                    <div class="form-group">
                        <label for="loginName">Votre identifiant :</label><br />
                        <input type="text" id="loginName"   name="loginName" class="form-control input-lg" />
                    </div>
                    <div class="form-group">
                        <label for="pass">Votre mot de passe :</label><br />
                        <input type="password" id="pass"   name="pass"  class="form-control input-lg" />
                    </div>
                
                    <div class="form-group">
                        <input class="btn btn-lg btn-custom" type="submit" value="Envoyer"/>
                    </div>
                </form>

            </div>
        </div>
    </section >

</div>  

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>