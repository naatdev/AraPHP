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
* This file contains the autoload for your web application
*/
// register a function to be called when using new
spl_autoload_register(function($class){
    // Separate namespace and class name
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $exp = explode(DIRECTORY_SEPARATOR, $class, 3);
    // If we have a simple namespace with a class without sub namespaces and sub dir
    if(count($exp) == 2) {
        // For namespaces \AraPHP
        if($exp[0] == 'AraPHP') {
            $fileClass = 'core/' . $exp[1] . '.php';
            if(file_exists($fileClass)) {
                include_once($fileClass);
            }
        }
    }
    // If we have three parts
    if(count($exp) == 3) {
        // For namespaces \MyApp
        if($exp[0] == 'MyApp') {
            // For namespaces \MyApp\Libs
            if($exp[1] == 'Libs') {
                $fileClass = 'libs/' . $exp[2] . '.php';
                if(file_exists($fileClass)) {
                    include_once($fileClass);
                }
            }
            // For namespaces \MyApp\Plugins
            if($exp[1] == 'Plugins') {
                $fileClass = 'plugins/' . $exp[2] . '.php';
                if(file_exists($fileClass)) {
                    include_once($fileClass);
                }
            }
            // For namespaces \MyApp\Models
            if($exp[1] == 'Models') {
                $fileClass = 'app/models/' . $exp[2] . '.php';
                if(file_exists($fileClass)) {
                    include_once($fileClass);
                }
            }
        }
    }
});