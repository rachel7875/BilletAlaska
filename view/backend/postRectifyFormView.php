<?php $title = "Modification du chapitre"; ?>

<?php ob_start(); ?>

<div class="main_content">

<div class="jumbotron text-center entete">
    <div class="container">
        <h1>Formulaire de <br />
        modification de chapitre</h1>
    </div>
</div>  

<section class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>Chapitre à modifier : chapitre <?= htmlspecialchars($postToModify['numChapter']) ;?> </h2>

            <form class="well" action="index.php?action=rectifySavePost&amp;id=<?=$postToModify['id']?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Identification </legend> 
                        <div class="form-group">
                            <label for="new_numChapter">Nouveau numéro de chapitre :</label><br />
                            <input type="number" min=1 id="new_numChapter" value="<?=htmlspecialchars($postToModify['numChapter']);?>"  name="new_numChapter" />
                        </div>
                        <div class="form-group">
                            <label for="new_title">Nouveau titre de chapitre :</label>
                            <p class="help-block">(100 caractères max.)</p> 
                            <input type="text" id="new_title" value="<?=htmlspecialchars($postToModify['title']);?>"  name="new_title" class="form-control" />
                            
                        </div>
                       
                </fieldset> 
        
                <fieldset>  
                    <legend>Contenu & Résumé </legend>  
                    <div class="form-group">
                        <label for="new_content">Nouveau contenu du chapitre :</label>
                        <textarea id="new_content"  name="new_content" rows="45" class="form-control"> <?=htmlspecialchars($postToModify['content']);?> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="new_summary">Nouveau résumé du chapitre :</label>
                        <textarea id="new_summary"  name="new_summary" rows="4" class="form-control"> <?=htmlspecialchars($postToModify['summary']);?> </textarea>
                    </div>
                </fieldset>  
                
                <fieldset>  
                    <legend>Photo </legend>
                    <div class="form-group" >

                        <div class="row">
                            <div class="col-sm-5">  
                                <p><strong>Photo actuelle : </strong> </p> 
                                <img src="<?=$postToModify['photoLink']?>" class="img-responsive"> 
                            </div>
                            <div id="col_photo" class="col-sm-7">  
                                <label for="new_chapterPhoto">Nouvelle photo du chapitre : </label>
                                <p class="help-block">(Photo max 1.2 Mo |.jpg .jpeg .gif .png)</p> 
                                
                                <input type="file" name="new_chapterPhoto" id="new_chapterPhoto" />


                               
                            </div>
                        </div> 
                    </div>
                </fieldset> 

                <fieldset>  
                        <legend>Publication </legend>
                        <div class="form-group">
                            <label for="new_publicationDateSimple">Date de publication : </label>
                            <p class="help-block">Le chapitre est publié le jour de cette date. Ne remplir ce champ que si vous êtes sûr. </p> 
                            <input type="date" name="new_publicationDateSimple" id="new_publicationDateSimple" value="<?=htmlspecialchars($postToModify['publicationDateSmall']);?>" />
                        </div>
                    </fieldset>

                <div class="form-group">
                    <input class="btn btn-lg btn-custom" type="submit"  />
                </div>
            </form>
        </div>
    </div>
</section>          

<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>