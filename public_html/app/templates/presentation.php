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

/**
* This is an example template
*/
defined('AraPHP_Running') OR exit('Impossible to load this script');
$libPaths = (new \MyApp\Libs\Paths());
$path_css = $libPaths->AppPath('css/');
$path_root = $libPaths->RootPath();
$page_path = $libPaths->AppPage('/');
$current_page = $libPaths->CurrentPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AraPHP &nbsp; | &nbsp; <?php $this->PageTag('title'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= $path_css; ?>stylesheet.css" media="screen" />
    <link rel="shortcut icon" href="<?= $path_root; ?>favicon.ico" />
</head>
<body>
    <div id="pageHeader">
        <div class="row" id="pageHeaderContent">
            <div class="col col-lg-10">
                <h2><?php $this->PageTag('full_title'); ?></h2>
            </div>
            <div class="col col-lg-10">
                <?php $this->PageTag('content'); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</body>
</html>