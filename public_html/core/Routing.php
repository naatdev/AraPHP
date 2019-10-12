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
* Routing is a class for routing an AraPHP application
*
*
* Example usage:
* new \AraPHP\Routing($request, $configuration);
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
class Routing {

    /**
     * $url
     *
     * @var undefined
     */
    private $url;
    /**
     * $routes
     *
     * @var undefined
     */
    private $routes = array();
    /**
     * $theRoutes
     *
     * @var undefined
     */
    private $theRoutes = array();
    /**
     * $configuration
     *
     * @var undefined
     */
    private $configuration = array();

    /**
     * __construct
     *
     * @param  mixed $url
     * @param  mixed $configuration
     *
     * @return void
     */
    public function __construct($url = '/', $configuration){
        $this->url = $url;
        $this->configuration = $configuration;
        foreach($configuration['routes'] as $value) {
            if($value['method'] == "get") {
                $this->newRoute($value['url'], $value['dest'], 'GET');
            }
            if($value['method'] == "post") {
                $this->newRoute($value['url'], $value['dest'], 'POST');
            }
        }
        // Check if we have the request method
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            //throw new AraException('AraPHP:Router:REQUEST_METHOD not set');
            // if no method we use the GET one
            $_SERVER['REQUEST_METHOD'] = 'GET';
        }
        // Foreach the routes with the method used
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            // Ckeck if the route matches
            if($route->check($this->url)){
                // If matches execute the controller
                return $route->controller();
            }
        }
        //throw new AraException('AraPHP:Router:no route matches');
        // if no route matches we use the first one
        $default = $this->newRoute(
            $url,
            $configuration['routes'][0]['dest'],
            $_SERVER['REQUEST_METHOD']
        );
        $default->check($url, 1);
        $default->controller();
    }

    /**
     * newRoute
     *
     * @param  mixed $url
     * @param  mixed $dest
     * @param  mixed $method
     *
     * @return void
     */
    private function newRoute($url, $dest, $method){
        // Add a new route
        $route = new \AraPHP\Route($this->configuration, $url, $dest);
        $this->routes[$method][] = $route;
        $this->theRoutes[$dest] = $route;
        return $route;
    }

}