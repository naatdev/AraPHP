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
* Route is a class for creating a route in an AraPHP application
*
*
* Example usage:
* new \AraPHP\Route($configuration, $url, $dest);
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
class Route {

    /**
     * $url
     *
     * @var undefined
     */
    private $url;
    /**
     * $dest
     *
     * @var undefined
     */
    private $dest;
    /**
     * $params
     *
     * @var array
     */
    private $params = [];
    /**
     * $configuration
     *
     * @var array
     */
    private $configuration = [];

    /**
     * __construct
     *
     * @param  mixed $configuration
     * @param  mixed $url
     * @param  mixed $dest
     *
     * @return void
     */
    public function __construct($configuration, $url, $dest){
        // Got the url, clean it and save it
        $this->url = trim($url, '/');
        $this->dest = $dest;
        $this->configuration = $configuration;
    }

    /**
     * check
     *
     * @param  mixed $url
     * @param  mixed $default
     *
     * @return void
     */
    public function check($url, $default = 0){
        // Get the url and params
        $url = trim($url, '/');
        // Get the name of each param
        $partsUrl = explode('/', $this->url);
        foreach($partsUrl as $partUrl) {
            if(preg_match("#^:#", $partUrl)) {
                $paramsName[] = $partUrl;
            }
        }
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->url);
        // Check the url if it's not the default route
        if(!preg_match("#^$path$#i", $url, $params) AND $default != 1){
            // return false if url does not match
            return false;
        }
        // if it's the default route we don't have params
        if($default == 1) {
            $params = [];
        }
        // Delete the first param
        array_shift($params);
        // Foreach param to get his name
        foreach($params as $key => $value) {
            // Deleting the param
            unset($params[$key]);
            // Creating a new one in the array with the right key
            $key = str_replace(':', '', $paramsName[$key]);
            $params[$key] = $value;
        }
        // Set the params
        $this->matches = $params;
        // return true, the url matches
        return true;
    }

    /**
     * controller
     *
     * @return void
     */
    public function controller(){
        // we load the controller if the url matches
        new \AraPHP\Controller($this->configuration, $this->dest, $this->matches);
    }

}