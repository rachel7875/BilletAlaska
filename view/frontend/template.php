<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
           <!--  <meta name="description" content=""-->
            <meta name="author" content="Jean FORTEROCHE ">
            <link rel="icon" type="image/png" href="public/images/logo_jf_nn.png">

        <title><?= $title ?></title>
        <meta name="description" content="<?= $metaDescription ?>" />

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/style.css" rel="stylesheet">


    </head>
        
    <body>
        <?php include("header.php"); ?>   
        
        <div id="content">
            <?= $content ?>
        </div>

        <footer class="footer">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p><a href="index.php?action=mentionsLegales">Mentions légales   </a>   |   © Jean Forteroche - 2018 </p>
                    <p><a href="index.php?action=adminLoginForm">Administration du site</a> </p>
                    <p>Sité réalisé par Rachel Mabire dans le cadre <br />
                    de la formation "Chef de projet - Développement" </p>
                </div>
            </div>
        </footer>


        <script src="public/js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

    </body>


</html>

