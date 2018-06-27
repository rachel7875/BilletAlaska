<?php
require('routes.php');
require('controller/frontendController.php');
require('controller/backendController.php');
require('controller/logController.php');

$routes = getRoutes();

try {
    if (isset($_GET['action'])) {
    $controller = $routes[$_GET['action']]['controller'];
    $method = $routes[$_GET['action']]['action'];
    
    $ctrl = new $controller();
    $ctrl->$method(array_merge($_GET, $_POST));
    }
    else {
        $control = new \OpenClassrooms\Blog\Controller\FrontController();
        $control->home();   
        
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
   }
 