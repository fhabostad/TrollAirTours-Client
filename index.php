<?php

//////////////////////////////////////////
// The main index.php file that glues it all together
//////////////////////////////////////////


// View layer - The same header for all pages
require("view/header.html");



// Global configuration
require_once("config.php");

// Model layer - Database functions
require_once("model/db.php");

// Controller layer - select page to display (controller will handle it)
// This will select necessary $template and $data
require_once("controller/controllers.php");
require_once("controller/Router.php");

$router = new Router();
$controller = $router->getController();
if ($controller instanceof Controller) {
    // Show page content. It might involve selecting data and rendering a template
    $controller->show($router->getPage());
}



// View layer - The same footer for all pages
require("view/footer.html");

