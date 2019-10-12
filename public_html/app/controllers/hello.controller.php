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
namespace MyApp;

defined('AraPHP_Running') OR exit('Impossible to load this script');

Class hello {

    public function __construct($arguments) {
        // A lib can be called here
        //new Libs\VarCheck($test);
        // A view can be called
        //new \AraPHP\View("Home", $arguments);

        // Create a page from a template ("page" in this example)
        // Set the differents items of the page
        // And give the arguments received by the controller
        (new \AraPHP\Template())->PageFromTemplate(
            "page",
            array(
                'title'     => 'string:Hello !', // Title of the page is a string
                'content'   => 'view:Home', // In the content part we call a view called "Home"
            ),
            $arguments
        );
    }

}