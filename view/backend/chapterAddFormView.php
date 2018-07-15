<?php $title = "Ajout d'un chapitre"; ?>

<?php ob_start(); ?>

<div class="main_content">

    <div class="jumbotron text-center entete">
        <div class="container">
            <h1 >Formulaire de saisie <br />
            de nouveau chapitre</h1>
        </div>
    </div>  

    <section class="container">
        <div class="row">
            <div class="col-sm-12">
            
                <form class="well" action="index.php?action=addPost" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Identification </legend>
                        <div class="form-group">
                            <label for="numChapter">Numéro du nouveau chapitre</label><br />
                            <input type="number" min=1 id="numChapter"   name="numChapter" />
                        </div>
                        <div class="form-group">
                            <label for="title">Titre du nouveau chapitre</label>
                            <p class="help-block">(100 caractères max.)</p> 
                            <input type="text" id="title"   name="title" class="form-control" />
                        </div>
                    </fieldset> 

                    <fieldset>  
                        <legend>Contenu & Résumé </legend>  
                        <div class="form-group">
                            <label for="content">Contenu du nouveau chapitre</label>
                            <textarea id="content"  name="content" rows="45" class="form-control">  </textarea>
                        </div>
                        <div class="form-group">
                            <label for="summary">Résumé du nouveau chapitre</label>
                            <textarea id="summary"  name="summary" rows="4" class="form-control"> </textarea>
                        </div>
                    </fieldset>

                    <fieldset>  
                        <legend>Photo </legend>
                        <div class="form-group">
                            <label for="chapterPhoto">Photo du nouveau chapitre</label>
                            <p class="help-block">(Photo max 1.2 Mo |.jpg .jpeg .gif .png)</p> 
                            <input type="file" name="chapterPhoto" id="chapterPhoto" />
                        </div>
                    </fieldset>

                    <fieldset>  
                        <legend>Publication </legend>
                        <div class="form-group">
                            <label for="publicationDateSimple">Date de publication : </label>
                            <p class="help-block">Le chapitre est publié le jour de cette date. Ne remplir ce champ que si vous êtes sûr. </p> 
                            <input type="date" name="publicationDateSimple" id="publicationDateSimple" />
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <input class="btn btn-lg btn-custom" type="submit" value="Valider"/>
                    </div>
                </form>
            </div>
        </div>

    </section >
</div>  


<?php $content = ob_get_clean(); ?>

<?php require('templateAdm.php'); ?>