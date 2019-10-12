<?php
/*
   ____    .-------.       ____    .-------. .---.  .---. .-------.  
 .'  __ `. |  _ _   \    .'  __ `. \  _(`)_ \|   |  |_ _| \  _(`)_ \ 
/   '  \  \| ( ' )  |   /   '  \  \| (_ o._)||   |  ( ' ) | (_ o._)| 
|___|  /  ||(_ o _) /   |___|  /  ||  (_,_) /|   '-(_{;}_)|  (_,_) / 
   _.-`   || (_,_).' __    _.-`   ||   '-.-' |      (_,_) |   '-.-'  
.'   _    ||  |\ \  |  |.'   _    ||   |     | _ _--.   | |   |      
|  _( )_  ||  | \ `'   /|  _( )_  ||   |     |( ' ) |   | |   |      
\ (_ o _) /|  |  \    / \ (_ o _) //   )     (_{;}_)|   | /   )      
 '.(_,_).' ''-'   `'-'   '.(_,_).' `---'     '(_,_) '---' `---'      
                                                                     
*/
// Defining our constants
define('APP_SRC_DIR', 'app'); // The dir of the source code of the app
define('APP_ASSETS_DIR', 'assets'); // The dir of assets from the root
define('APP_USE_INDEX', 'True'); // Does URL have to point to index.php

// Loading the autoloader
require APP_SRC_DIR . '/autoload.php';

// Include the routes configuration
require APP_SRC_DIR . '/routes.php';

// Running our app with the proper config
new \AraPHP\App(array(
   // Configuration of the app for AraPHP
   "configuration" => array(
      "app_type"        => "Web", // [Web,API]
      "app_mode"        => "Dev", // [Dev/Prod]
      "php_timezone"    => "Europe/Paris",
   ),
   // List of the routes
   "routes" => $routes
));
