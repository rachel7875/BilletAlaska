<header>

    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid" id="publicMenu">
        <div class="navbar-header " >
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-left ">
            <a class="navbar-text " id="logo" href="index.php"><img src="public/images/logo_jf_nn.png" alt="logo de Jean FORTEROCHE" /></p>
            <a class="navbar-brand" id="brand"  href="index.php">BILLET SIMPLE POUR L'ALASKA </a>
          </div>  
        </div>

        <div id="navbarPublic" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Accueil</a></li>
            <li><a href="index.php?action=listChapters">Les chapitres</a></li>
            <li><a href="index.php?action=author" >L'auteur</a></li>
          </ul>
        </div>
      

        <div class="<?php if(!isset($_SESSION['idUser']) OR !isset($_SESSION['loginName'])){?>hidden<?php }?> navbar-right" id="adminOnPublic">
            <p class="navbar-text">Bonjour <?=$_SESSION['loginName'];?> </p>
            <a class="btn btn-danger btn-xs navbar-btn" href="index.php?action=logout"><span class="glyphicon glyphicon-off"></span> </a>
            <a class="btn btn-customTer btn-xs navbar-btn" id="text_admin" href="index.php?action=administration">Administration</a>
        </div>

      </div>

    </nav>


</header>