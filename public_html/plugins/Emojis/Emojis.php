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
namespace MyApp\Plugins\Emojis;

Class Emojis {

    /**
     * $ExtraFiles
     *
     * @var string
     */
    private $ExtraFiles = '../plugins/Emojis';
    /**
     * $AppUrl
     *
     * @var undefined
     */
    private $AppUrl;
    /**
     * $EmojisConfig
     *
     * @var undefined
     */
    private $EmojisConfig;
    /**
     * $StringToParse
     *
     * @var undefined
     */
    private $StringToParse;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        //echo __DIR__;
        $this->AppUrl = (new \MyApp\Libs\Paths())->AppPath('images');
        $this->ExtractConfig();
    }

    /**
     * ExtractConfig
     *
     * @return void
     */
    private function ExtractConfig() {
        $config = file_get_contents($this->ExtraFiles . '/emojis.json');
        $this->EmojisConfig = json_decode($config);
        return True;
    }

}