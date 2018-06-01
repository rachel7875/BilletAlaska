<?php $title = 'Billet simple pour l\'Alaska - Accueil'; ?>

<?php ob_start(); ?>


<div class="main_content">
    <div class="container-fluid">
        <div id="myCarousel" class="carousel slide row" data-ride="carousel">
            <div class="col-lg-12">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" >
                    <div class="item active">
                        <img class="first-slide" src="public/images/denali_national_park.jpg" alt="Photo du parc national de Denali en Alaska">
                        <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>BILLET SIMPLE POUR L'ALASKA.</h1>
                            <p>Découvrez le dernier roman de Jean Forteroche.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire le synopsis</a></p>
                        </div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="second-slide" src="public/images/mountain_whale.jpg" alt="Photo d'une baleine avec les montagnes en arrière-plan">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>BILLET SIMPLE POUR L'ALASKA.</h1>
                                <p>Retrouvez les dernières aventures de Lucas</p>
                                <p><a class="btn btn-lg btn-primary" href="index.php?action=nbLastPost" role="button">Lire le dernier chapitre paru</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img class="third-slide" src="public/images/author.jpg" alt="Photo de Jean Forteroche en Alaska">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>Jean FORTEROCHE.</h1>
                                <p>Un auteur aux nombreux livres...</p>
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">L'auteur</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <section class="row ">
            <div class="col-lg-offset-2 col-lg-8">

                <h1 class="text-center" >Bienvenue sur le blog de mon dernier roman "Billet simple pour l'Alaska"</h1>
                <div  class="row" >
                    <blockquote  class="col-lg-offset-2 col-lg-8" >
                
                         J'espère que mon roman vous passionnera et vous fera passer un agréable moment !<br>
 
                        <small class="pull-right">Jean Forteroche</small><br>
                    </blockquote>
                </div>

                <div class="jumbotron text-center">
                    <h2>Synopsis </h2>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </p>
                    <p> "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                </div>

            </div> 
        </section>
        <section class="container callouts">

            <!-- Three columns of text -->
            <div class="row">
                <div class="table-row-equal">
                    <div class="thumbnail">
                        <div class="image" style="background-image:url(public/images/paris.jpg)"></div>
                        <div class="caption">
                            <div class="textcaption">
                                <h2>Commencez le livre</h2>
                                <p>Jetez un oeil au premier chapitre : vous allez avoir envie de connaître toute l'histoire !</p>
                            </div>        
                            <p><a href="index.php?action=post&amp;id=1>" class="btn btn-primary" role="button">Lire &raquo;</a> </p>
                        </div>
                    </div>
                   
                    <div class="thumbnail">
                        <div class="image" style="background-image:url(public/images/glacier_bay.jpg)"></div>
                        <div class="caption">
                            <div class="textcaption">
                                <h2>Dernier chapitre paru ! </h2>
                                <p>Retrouvez les dernières aventures de Lucas <br/></p>
                            </div>     
                            <p><a href="index.php?action=nbLastPost" class="btn btn-primary" role="button">Lire &raquo;</a> </p>
                        </div>
                    </div>    
                 
                    <div class="thumbnail">
                        <div class="image" style="background-image:url(public/images/glacier_bay.jpg)"></div>
                        <div class="caption">
                            <div class="textcaption">
                                <h2>Liste des chapitres</h2>
                                <p>Retrouvez tous les chapitres et leurs résumés<br /></p>
                            </div>  
                            <div class="linkcaption">    
                             <p ><a href="index.php?action=listChapters" class="btn btn-primary" role="button">Les chapitres &raquo;</a> </p>
                             </div> 
                        </div>
                    </div>    
                </div>  

            </div>
             
        </section> 
    </div>    
</div>    



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?> 