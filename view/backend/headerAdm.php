<header>

    
    <nav class="navbar navbar-default navbar-fixed-top" >
      <div class="container-fluid" id="navbarInvAdm">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarAdm" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <div class="navbar-left ">
            <a class="navbar-text " id="logo" title="Accès au site public" href="index.php"><img src="public/images/logo_jf_nn.png" alt="logo de Jean FORTEROCHE" /></a>
            <a class="navbar-brand" id="brand" title="Accès au site public"  href="index.php">BILLET SIMPLE POUR L'ALASKA </a>
          </div>
        </div>
        <div id="navbarAdm" class="collapse navbar-collapse text-center">
          <ul class="nav navbar-nav  ">
            <li class="active"><a href="index.php?action=administration">Accueil <br /> Administration</a></li>
            <li><a id="chapterMenuAdm" href="index.php?action=listPostsAdm">Gestion des <br />Chapitres</a></li>
            <li><a href="index.php?action=listCommentsAdm">Gestion des <br />Commentaires</a></li>
          </ul>
        </div>
        
        <div class="navbar-right" id="menuRightAdm">
          
          <a class="btn btn-danger btn-xs navbar-btn" href="index.php?action=logout"><span class="glyphicon glyphicon-off"></span> </a>
          <a class="btn btn-customTer btn-xs navbar-btn" href="index.php">SITE PUBLIC</a>
          <p class="navbar-text">Bonjour <?=$_SESSION['loginName'];?> </p>
          
        </div>

      </div> 
    </nav>


</header>