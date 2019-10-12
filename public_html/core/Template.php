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
* Template is a class for calling a template in an AraPHP application
*
*
* Example usage:
* (new \AraPHP\Template())->PageFromTemplate($template, $parts, $arguments);
* (new \AraPHP\Template())->PageTag($tag);
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
Class Template extends Controller {

    /**
     * $template
     *
     * @var undefined
     */
    private $template;
    /**
     * $view
     *
     * @var undefined
     */
    private $view;
    /**
     * $views
     *
     * @var array
     */
    private $views = [];
    /**
     * $arguments
     *
     * @var array
     */
    private $arguments = [];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * PageFromTemplate
     *
     * @param  mixed $template
     * @param  mixed $views
     * @param  mixed $arguments
     *
     * @return void
     */
    public function PageFromTemplate($template, $views, $arguments = array()) {
        $this->template = $template;
        $this->views = $views;
        $this->arguments = $arguments;
        if(file_exists(APP_SRC_DIR . '/templates/' . $this->template . '.php')) {
            require APP_SRC_DIR . '/templates/' . $this->template . '.php';   
        }
    }

    /**
     * PageTag
     *
     * @param  mixed $view
     *
     * @return void
     */
    public function PageTag($view) {
        // Check if what's called is a view or if we want to display a string
        if(!is_callable($this->views[$view])) {
            $type_request = explode(':', $this->views[$view]);
            if(count($type_request) == 2) {
                // The type is the first item of array and request the second one
                $type = $type_request[0];
                $request = $type_request[1];

                // For string
                if($type == 'string') {
                    echo $request;
                    return True;
                }
                // For view
                elseif($type == 'view') {
                    (new \AraPHP\View($request, $this->arguments))->LoadView();
                    return True;
                }
                // If unknown type
                else {
                    return False;
                }    
            }
        }
        // If no type and it's callable, it's a closure
        else{
            return call_user_func($this->views[$view]);
        }
    }

    /**
     * GiveAsset
     *
     * @param  mixed $asset
     *
     * @return void
     */
    public function GiveAsset($asset) {
        return $this->configuration['assets_dir'];
    }

}
