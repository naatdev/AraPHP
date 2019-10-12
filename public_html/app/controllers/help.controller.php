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

Class help {

    public function __construct($arguments) {
        
        // Create a page from a template ("presentation" in this example)
        // Set the differents items of the page
        // And give the arguments received by the controller
        (new \AraPHP\Template())->PageFromTemplate(
            "presentation",
            array(
                'title'     => 'string:Getting Started', // Title of the page is a string
                'full_title'=> 'string:Getting Started with the basics of AraPHP', // FullTitle of the page is a string
                //'content'   => 'view:Help', // In the content part we call a view called "Help"
                'content'   => function() { // We can also call a closure function
                    (new \AraPHP\View('Help'))->LoadView();
                    //print_r(get_defined_constants()); // Example of usage of a function
                }
            ),
            $arguments
        );

    }

}