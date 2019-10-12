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
namespace MyApp\Libs;

Class Dev {
    /**
     * getControllers
     *
     * @return void
     */
    public function getControllers() {
        $return = [];

        return $return;
    }
    /**
     * getRoutes
     *
     * @return void
     */
    public function getRoutes() {
        $return = [];
        require APP_SRC_DIR . '/routes.php';
        foreach($routes as $key => $value) {
            $addKey = 'the url ' . str_pad($value['url'], 30);
            $addValue = 'called with method ' . strtoupper(str_pad($value['method'], 5)) . ' redirects to the controller ' . $value['dest'];
            $return[$addKey] = $addValue;
        }
        $return = $this->formatHTML($return);
        echo $return;
        return $return;
    }
    /**
     * getRoutesForController
     *
     * @param mixed $controllerName
     * @return void
     */
    public function getRoutesForController($controllerName) {
        $return = [];

        return $return;
    }
    /**
     * getViews
     *
     * @return void
     */
    public function getViews() {
        $return = [];

        return $return;
    }
    /**
     * getTemplates
     *
     * @return void
     */
    public function getTemplates() {
        $return = [];

        return $return;
    }
    /**
     * getTagsForTemplate
     *
     * @param mixed $templateName
     * @return void
     */
    public function getTagsForTemplate($templateName) {
        $return = [];

        return $return;
    }
    /**
     * formatHTML
     *
     * @param array $array
     * @return void
     */
    public function formatHTML($array) {
        $return = '<table>';
        foreach($array as $key => $value) {
            $return .= '<tr>';
            $return .= '<td><b>' . $key . '</b><td>';
            $return .= '<td><i>' . $value . '</i></td>';
            $return .= '</tr>';
        }
        $return .= '</table>';
        return $return;
    }
}