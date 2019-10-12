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
* AraException is a class for mannaging exceptions in an AraPHP
*
*
* Example usage:
* 
*
* @package  AraPHP
* @author   Florian Hourdin <florian.hourdin59300@gmail.com>
* @access   public
*/
Class AraException extends \Exception implements \Throwable {

  /**
   * $message
   *
   * @var undefined
   */
  protected $message;
  /**
   * $code
   *
   * @var undefined
   */
  protected $code;
  /**
   * $file
   *
   * @var undefined
   */
  protected $file;
  /**
   * $line
   *
   * @var undefined
   */
  protected $line;
  
  public function __construct () {
    
  }

  final public function getMessage() {}
  final public function getPrevious() {}
  final public function getCode() {}
  final public function getFile() {}
  final public function getLine() {}
  final public function getTrace() {}
  final public function getTraceAsString() {}
  public function __toString() {}
  final private function __clone() {}

}