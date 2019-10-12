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
* This is an example view for homepage
*/
defined('AraPHP_Running') OR exit('Impossible to load this script');
?>
<p>
    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
        <img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" />
    </a>
    <br />
    <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">AraPHP</span> de <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/naatdev/" property="cc:attributionName" rel="cc:attributionURL">Florian Hourdin</a> est mis à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">licence Creative Commons Attribution - Pas d&#39;Utilisation Commerciale - Pas de Modification 4.0 International</a>.
</p>
<p>
    <?php echo isset($arguments['id']) ? 'Param given: ' . $arguments['id'] : ''; ?>
</p>