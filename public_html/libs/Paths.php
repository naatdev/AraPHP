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

Class Paths {

    /**
     * $AppUrl
     *
     * @var undefined
     */
    private $AppUrl;
    /**
     * $PageUrl
     *
     * @var undefined
     */
    private $PageUrl;
    /**
     * $CurrentPage
     *
     * @var undefined
     */
    private $CurrentPage;

    /**
     * __construct
     *
     * @param mixed $page
     * @return void
     */
    public function __construct($page = False) {
        
    }

    /**
     * AppPath
     *
     * @param mixed $asset
     * @return void
     */
    public function AppPath($asset = False) {
        $this->AppUrl = '//';
        $this->AppUrl .= $_SERVER['HTTP_HOST'];
        $this->AppUrl .= str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        if($asset == False) {
            return $this->AppUrl;
        }
        else{
            return $this->AppUrl . '/' . APP_ASSETS_DIR . '/' . $asset;
        }
    }

    /**
     * RootPath
     *
     * @return void
     */
    public function RootPath() {
        return $this->AppPath() . '/';
    }

    /**
     * AppPage
     *
     * @param mixed $page
     * @return void
     */
    public function AppPage($page = '/') {
        $this->PageUrl = '//';
        $this->PageUrl .= $_SERVER['HTTP_HOST'];
        $this->PageUrl .= $_SERVER['SCRIPT_NAME'];
        if(APP_USE_INDEX == 'False') {
            $this->PageUrl = str_replace('/index.php', '', $this->PageUrl);
        }
        return $this->PageUrl . $page;
    }
    
    /**
     * CurrentPage
     *
     * @return void
     */
    public function CurrentPage() {
        $this->CurrentPage = str_replace('/index.php/', '', $_SERVER['PHP_SELF']);
        if(empty($this->CurrentPage) OR $this->CurrentPage == '/index.php') {
            $this->CurrentPage = '/';
        }
        return $this->CurrentPage;
    }

}