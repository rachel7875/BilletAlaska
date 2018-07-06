<?php

if(!isset($_SESSION['idUser']) OR !isset($_SESSION['loginName'])){
    header('Location: index.php?action=login');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    

        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="public/css/style.css" rel="stylesheet">



    </head>

    <body>
        <?php include("headerAdm.php"); ?>   

        <?= $content ?>

        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                mode : "textareas",
                editor_deselector : "mceNoEditor",
                plugins: "print searchreplace visualblocks",
                menubar: "file edit view",
                toolbar: 'searchreplace | visualblocks | styleselect | bold italic alignleft aligncenter alignright alignjustify |   print  ',
                visualblocks_default_state: true
            });
        </script>
        <script src="public/js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
       

    </body>
</html>
