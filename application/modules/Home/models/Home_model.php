<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Setting_model Class extends CI_Model
 */
class Home_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
    /**
   	  * This function is used to get settings 
	*/
}?>