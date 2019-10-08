<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Checking user is login or not 
	    is_login();
	    $this->load->model("Home_model");    
	  }
	  
  	/**
   	* Load Home view page
	*/

	public function index() {
		$this->load->view('include/header');
		// $data = $this->session->get_userdata();
		// $user_id = $data['user_details'][0]->ID_UUSER;
		// $entites = $this->AdminEntite_model->getEntites($user_id);
		// $data['result'] = $entites;
		$this->load->view('index');

	    $this->load->view('include/footer');
	}
}
?>