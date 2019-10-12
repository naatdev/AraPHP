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
/**
* This file contains all the routes for your web application
*/

// Defining the app's routes
$routes = array();

// Adding a new route for home (it's also the default route as it's the first one)
$routes[] = array(
    "method"  => "get",
    "url"     => "/",
    "dest"    => "home"
);

// Adding a new route for hello with a parameter
$routes[] = array(
    "method"  => "get",
    "url"     => "/hello/:id/hello",
    "dest"    => "hello"
);

// Adding a new route for help
$routes[] = array(
    "method"  => "get",
    "url"     => "/help/",
    "dest"    => "help"
);

$routes[] = array(
    "method"  => "post",
    "url"     => "/help/",
    "dest"    => "help"
);