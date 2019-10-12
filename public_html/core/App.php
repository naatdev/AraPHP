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
namespace AraPHP;

/**
* App is a class for initialising an AraPHP application
*
*
* Example usage:
* new \AraPHP\App($configuration)
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
Class App {

    /**
     * $request
     *
     * @var undefined
     */
    private $request;
    /**
     * $configuration
     *
     * @var undefined
     */
    private $configuration;

    /**
     * __construct
     *
     * @param  mixed $configuration
     *
     * @return void
     */
    public function __construct($configuration = array("configuration" => array())) {
        // Set the state running of AraPHP
        define('AraPHP_Running', 'True');

        // Starting an output buffer
        ob_start();

        // Saving the config
        $this->configuration = $configuration;

        // Check if we are making a Web App
        if($this->configuration['configuration']['app_type'] == "Web") {
            // Setting Headers
            header('Content-Type: text/html; charset=utf-8');

            // Starting a PHP Session
            session_start();
        }
        // Or if we are making an API
        elseif($this->configuration['configuration']['app_type'] == "API"){
            // Setting Headers
            header('Content-Type: application/json; charset=utf-8');
        }
        // Or if it's different
        else{

        }

        // Checking the mode of our app
        if($this->configuration['configuration']['app_mode'] AND $this->configuration['configuration']['app_mode'] == "Dev") {
            // If development, then display errors
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }

        // Get the request
        if(isset($_SERVER['PATH_INFO'])) {

            // Sub the first slash of path if exists
            $this->request = substr($_SERVER['PATH_INFO'], 1);

            // Sub the last one if exists too
            if(preg_match("#\/$#", $this->request)) {
                $this->request = substr($_SERVER['PATH_INFO'], 0, -1);
            }

        }
        else{
            // By default the request is null
            $this->request = '/';
        }

        // Load the routes
        $this->Router($this->request, $this->configuration);

    }

    /**
     * Router
     *
     * @param  mixed $request
     * @param  mixed $configuration
     *
     * @return void
     */
    private function Router($request, $configuration) {
        // We have the request and the config
        // Now we call the Routing class with the params
        new \AraPHP\Routing($request, $configuration);
    }

    /**
    * stop the ob and send page content
    * @return void
    */
    public function __destruct() {
        // Stopping the bufferization and sending content
        ob_end_flush();
    }
}