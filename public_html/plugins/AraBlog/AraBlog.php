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
namespace MyApp\Plugins\AraBlog;

Class AraBlog {

    /**
     * $ExtraFiles
     *
     * @var string
     */
    private $ExtraFiles = '../plugins/AraBlog';
    /**
     * $AppUrl
     *
     * @var undefined
     */
    private $AppUrl;
    private $AraBlogConfig;
    /**
     * $SlugModel
     *
     * @var string
     */
    public $SlugModel = 'YYYY-MM-DD-TITLE';
    /**
     * $StringToSlug
     *
     * @var undefined
     */
    private $StringToSlug;

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
        $config = file_get_contents($this->ExtraFiles . '/arablog.json');
        $this->AraBlogConfig = json_decode($config);
        return True;
    }

    /**
     * Slug
     *
     * @param mixed $string
     * @param mixed $model
     * @return void
     */
    public function Slug($string, $model = '') {
        $MySlugModel = strtoupper($model);
        $string = preg_replace("/[\/_|+ -]+/", '-', $string);
        $string = strtolower($string);
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
        $string = str_replace('--', '', $string);

        if(empty($MySlugModel)) {
            $MySlugModel = $this->SlugModel;
        }

        $MySlugExploded = explode('-', $MySlugModel);
        $MyFutureSlug = '';

        foreach($MySlugExploded as $SlugItem) {
            if($MyFutureSlug != '') {
                $MyFutureSlug .= '-';
            }
            switch($SlugItem) {
                case 'YYYY':
                    $MyFutureSlug .= date('Y');
                break;
                case 'MM':
                    $MyFutureSlug .= date('m');
                break;
                case 'DD':
                    $MyFutureSlug .= date('d');
                break;
                case 'TITLE':
                    $MyFutureSlug .= $string;
                break;
                default:
                    $MyFutureSlug .= rand(100000,999999);
                break;
            }
        }
        if(strlen($MyFutureSlug) > 50) {
            $MyFutureSlug = substr($MyFutureSlug, 0, 50);
        }
        return $MyFutureSlug;
    }

}