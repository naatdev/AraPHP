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

Class home {

    public function __construct($arguments) {
        
        // Create a page from a template ("page" in this example)
        // Set the differents items of the page
        // And give the arguments received by the controller
        (new \AraPHP\Template())->PageFromTemplate(
            "page",
            array(
                'title'     => 'string:Welcome', // Title of the page is a string
                'content'   => function() { // We can also call a closure function
                    $view = new \AraPHP\View('Home');
                    $view->LoadView();
                }, // In the content part we call a view called "Home"
            ),
            $arguments
        );
        // A plugin can be called in a controller
        //new Plugins\Emojis\Emojis();
        //echo (new Plugins\AraBlog\AraBlog())->Slug('Bienvenue sur mon blog !', 'RAND-TITLE-DD-MM-YYYY');
    }

}