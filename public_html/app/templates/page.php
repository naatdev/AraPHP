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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AraPHP &nbsp; | &nbsp; <?php $this->PageTag('title'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= $path_css; ?>stylesheet.css" media="screen" />
    <link rel="shortcut icon" href="<?= $path_root; ?>favicon.ico" />
</head>
<body>
    <nav class="topNavbar topNavbar-fixed">
        <div class="row" role="presentation">
            <div class="col col-lg-10 col-md-10 col-sm-10" role="presentation">
                <ul>
                    <li><a href="<?= $page_path; ?>" class="sitename">AraPHP</a></li>
                    <li><a href="<?= $page_path; ?>"<?php if($current_page == '/') { echo ' class="active"'; } ?>>Home</a></li>
                    <li class="col-sm-none"><a href="<?php echo $page_path; ?>hello/Test/hello"<?php if(preg_match("#^hello\/#", $current_page)) { echo ' class="active"'; } ?>>Hello</a></li>
                    <li><a href="<?= $page_path; ?>help"<?php if($current_page == 'help/') { echo ' class="active"'; } ?>>Getting Started</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </nav>

    <div id="pageContent">
        <h1>Framework AraPHP</h1>
        <br >
        <p class="main">
            If you see this screen, it means that AraPHP is properly installed and configured on your server!
        </p>
        <div class="row">
            <div class="col col-lg-10">
                <?php $this->PageTag('content'); ?>
            </div>
            <div class="col col-lg-10">
                <p>The web URL of this application is: <?php echo (new \MyApp\Libs\Paths())->RootPath(); ?></p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>