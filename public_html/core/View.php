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
* View is a class for calling a view in an AraPHP application
*
*
* Example usage:
* (new \AraPHP\View($view [, $arguments]));
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
Class View extends Controller {

    /**
     * $view
     *
     * @var undefined
     */
    private $view;
    /**
     * $arguments
     *
     * @var array
     */
    private $arguments = [];
    /**
     * $paramsView
     *
     * @var array
     */
    private $paramsView = [];

    /**
     * __construct
     *
     * @param  mixed $view
     * @param  mixed $arguments
     *
     * @return void
     */
    public function __construct($view, $arguments = array()) {
        $this->view = $view;
        $this->arguments = $arguments;
    }

    /**
     * __set
     *
     * @param  mixed $name
     * @param  mixed $value
     *
     * @return void
     */
    public function __set($name, $value) {
        if($name != "arguments") {
            $this->paramsView[$name] = $value;
        }
    }

    /**
     * LoadView
     *
     * @return void
     */
    public function LoadView() {
        foreach($this->paramsView as $name => $value) {
            $$name = $value;
        }
        $arguments = $this->arguments;
        if(file_exists(APP_SRC_DIR . '/views/' . $this->view . '.php')) {
            require APP_SRC_DIR . '/views/' . $this->view . '.php';
            return True;
        }
        else {
            return False;
        }
    }

}
