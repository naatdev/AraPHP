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
* Controller is a class for calling a controller an AraPHP application
*
*
* Example usage:
* new \AraPHP\Controller($configuration, $dest, $matches);
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
Class Controller {

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
    protected $configuration;
    /**
     * $routeDest
     *
     * @var undefined
     */
    private $routeDest;
    /**
     * $controllerClass
     *
     * @var undefined
     */
    private $controllerClass;
    /**
     * $argumentsController
     *
     * @var undefined
     */
    private $argumentsController;

    /**
     * __construct
     *
     * @param  mixed $configuration
     * @param  mixed $routeDest
     * @param  mixed $arguments
     *
     * @return void
     */
    public function __construct($configuration, $routeDest, $arguments  = array()) {
        $this->configuration = $configuration;
        $this->routeDest = $routeDest;
        $this->argumentsController = $arguments;

        // We have the config, the request and the route let's load the controller
        $this->LoadController();

    }

    /**
     * LoadController
     *
     * @return void
     */
    public function LoadController() {

        require APP_SRC_DIR . '/controllers/' . $this->routeDest . '.controller.php';
        $this->controllerClass = "\MyApp\\".$this->routeDest;
        new $this->controllerClass($this->argumentsController);

    }

}
