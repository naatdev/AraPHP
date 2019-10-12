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

Class VarCheck {

    /**
     * $infos
     *
     * @var undefined
     */
    private $infos;
    /**
     * $instance
     *
     * @var undefined
     */
    private $instance;

    /**
     * __construct
     *
     * @param mixed $var
     * @param mixed $format
     * @return void
     */
    public function __construct($var = 'No var specified', $format = 'HTML') {
        $this->infos = var_export($var, True);
        if($format == 'HTML') {
            $this->toHtml($var);
        }
    }

    /**
     * toHtml
     *
     * @param mixed $var
     * @return void
     */
    public function toHtml($var) {
        $this->instance = uniqid();

        $this->infos = "
            <style>
                div.VarCheck".$this->instance." {
                    border: 2px solid #F00;
                    width: 400px;
                }
                div.VarCheck".$this->instance." h1 {
                    background-color: #CCC;
                    line-height: 40px;
                    font-size: 25px;
                }
            </style>

            <div class='VarCheck".$this->instance."'>
                <h1>AraPHP Var Checker Lib</h1>
                <pre>
                    ".$this->infos."
                </pre>
            </div>
        ";

        echo $this->infos;
    }

}