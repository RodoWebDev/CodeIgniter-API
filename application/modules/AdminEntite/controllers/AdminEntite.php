<?php defined("BASEPATH") OR exit("No direct script access allowed");

class AdminEntite extends CI_Controller {

  	function __construct() {
	    parent::__construct();
	    //Checking user is login or not 
	    is_login();
		$this->load->model("AdminEntite_model");
		$this->load->helper("language");
  	}

  	/**
   	* Load AdminEntite view page
	*/
	   
	public function index() {
		$this->load->view('include/header');
		$data = $this->session->get_userdata();
		$user_id = $data['user_details'][0]->ID_UUSER;
		$entites = $this->AdminEntite_model->getEntites($user_id);
		$data['result'] = $entites;
		$this->load->view('index',$data);
	    $this->load->view('include/footer');
	}

    public function delete($id){
        is_login(); 
		$ids = explode('-', $id);
		
        foreach ($ids as $id) {
			$this->AdminEntite_model->deleteUserEntite($id);
            $this->AdminEntite_model->deleteEntite($id); 
		}
		redirect(base_url().'AdminEntite', 'refresh');
	}
	
	public function add_edit() {
		is_login();
		$data = $this->input->post();
		$userdata = $this->session->get_userdata();
		$user_id = $userdata['user_details'][0]->ID_UUSER;

		$data['ID_USER'] = $user_id;
		$data['DATE_MOD'] = date("Y-m-d H:i:s");  
		if ($data['ADMINISTRATEUR'] == "on") $data['ADMINISTRATEUR'] = 'O'; else $data['ADMINISTRATEUR'] = 'N';
		if ($data['BENEFICIAIRE'] == "on") $data['BENEFICIAIRE'] = 'O'; else $data['BENEFICIAIRE'] = 'N';
		if ($data['GESTIONNAIRE'] == "on") $data['GESTIONNAIRE'] = 'O'; else $data['GESTIONNAIRE'] = 'N';

		if ($data['DATE_DEB'] !='') { 
			$temp = strtotime($data['DATE_DEB']);		
			$data['DATE_DEB'] = date('Y-m-d', $temp); 
		} else {
			$data['DATE_DEB'] = '';
		}
		if ($data['DATE_FIN'] !='') { 
			$temp = strtotime($data['DATE_FIN']);		
			$data['DATE_FIN'] = date('Y-m-d', $temp); 
		} else {
			$data['DATE_FIN'] = '';
		}

		$data['ID_ENTITE_OFF'] = '';

		if($id = $this->input->post('ID_ENTITE')) {
			unset($data['edit']);
			$this->AdminEntite_model->updateRow('jt_entite', 'ID_ENTITE', $id, $data);

			$user_entite = array();
			$user_entite['ID_USER'] = $data['ID_USER'];
			$user_entite['ID_ENTITE'] = $data['ID_ENTITE'];
			$user_entite['DATE_MOD'] = $data['DATE_MOD'];
			$user_entite['DATE_DEB'] = $data['DATE_DEB'];
			$user_entite['DATE_FIN'] = $data['DATE_FIN'];
			$user_entite['ADMINISTRATEUR'] = $data['ADMINISTRATEUR'];

			$this->AdminEntite_model->updateRow('jt_user_entite', 'ID_ENTITE', $id, $user_entite);

			$this->session->set_flashdata('message', 'Your data updated Successfully..');
      		redirect(base_url().'AdminEntite'); 
		} else {
			unset($data['add']);
			$data['ID_ENTITE'] = date("YmdHis");
			
			$this->AdminEntite_model->insertRow('jt_entite',$data);
			$user_entite = array();
			$user_entite['ID_UUSER'] = $data['ID_USER'];
			$user_entite['ID_ENTITE'] = $data['ID_ENTITE'];
			$user_entite['DATE_MOD'] = $data['DATE_MOD'];
			$user_entite['DATE_DEB'] = $data['DATE_DEB'];
			$user_entite['DATE_FIN'] = $data['DATE_FIN'];
			$user_entite['ADMINISTRATEUR'] = $data['ADMINISTRATEUR'];
			$this->AdminEntite_model->insertRow('jt_user_entite',$user_entite);

			//$this->AdminEntite_model->addEntite($data);
			redirect(base_url().'AdminEntite'); 
		}
	}

    public function dataTable (){
		is_login();

		$data = $this->session->get_userdata();
		$user_id = $data['user_details'][0]->ID_UUSER;

$table = <<<EOT
(
	SELECT A.ID_ENTITE as ID, B.ID_ENT_JETEPAY, B.DATE_MOD AS DATE_MOD, B.ADMINISTRATEUR as ADMINISTRATEUR,
	B.BENEFICIAIRE AS BENEFICIAIRE, B.GESTIONNAIRE AS GESTIONNAIRE,B.ID_ENTITE_OFF AS ID_ENTITE_OFF, 
	B.ID_ADR1 AS ADR1, B.ID_ADR2 AS ADR2, B.ADR3 AS ADR3, B.ADR4 AS ADR4, B.ADR5 AS ADR5,B.ADR6 AS ADR6, 
	B.AD_WEB AS AD_WEB, B.AD_LOGO AS AD_LOGO, B.DATE_DEB AS DATE_DEB, B.DATE_FIN AS DATE_FIN, 
	B.BENE_IBAN AS IBAN 
	FROM jt_user_entite as A, jt_entite as B 
	WHERE A.ID_UUSER ='$user_id' and A.ID_ENTITE = B.ID_ENTITE
) temp
EOT;
		$primaryKey = 'ID';
    	$columns = array(
            array( 'db' => 'ID', 'dt' => 0 ),
            array( 'db' => 'ID_ENT_JETEPAY', 'dt' => 1 ),
            array( 'db' => 'ADMINISTRATEUR', 'dt' => 2 ),
            array( 'db' => 'BENEFICIAIRE', 'dt' => 3 ),
            array( 'db' => 'GESTIONNAIRE', 'dt' => 4 ),
            array( 'db' => 'ADR1', 'dt' => 5 ),
            array( 'db' => 'ADR2', 'dt' => 6 ),
            array( 'db' => 'ADR3', 'dt' => 7 ),
			array( 'db' => 'ADR4', 'dt' => 8 ),
			array( 'db' => 'ADR5', 'dt' => 9 ),
			array( 'db' => 'ADR6', 'dt' => 10 ),
			array( 'db' => 'AD_WEB', 'dt' => 11 ),
			array( 'db' => 'AD_LOGO', 'dt' => 12 ),
			array( 'db' => 'DATE_DEB', 'dt' => 13 ),
			array( 'db' => 'DATE_FIN', 'dt' => 14 ),
			array( 'db' => 'IBAN', 'dt' => 15 ),
            array( 'db' => 'ID', 'dt' => 16 )
		);

        $sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
        );

		$output_arr = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns);


		foreach ($output_arr['data'] as $key => $value) {
			$id = $output_arr['data'][$key][count($output_arr['data'][$key])  - 1];
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] = '';
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonEntite mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId(\''.$id.'\', \'AdminEntite\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
			$output_arr['data'][$key][0] = '<input type="checkbox" name="selData" onclick="selectRow(this)" value="'.$output_arr['data'][$key][0].'">';
		}

		echo(json_encode($output_arr));
	}

	/**
     * This function is used to show popup of user to add and update
     * @return Void
     */
    public function get_entite() {
        is_login();
        if($this->input->post('id')){
            $data['entiteData'] = getDataByid('jt_entite',$this->input->post('id'),'ID_ENTITE'); 
            echo $this->load->view('add_entite', $data, true);
        } else {
            echo $this->load->view('add_entite', '', true);
        }
        exit;
	}


	public function uploadFile($fielName) {
		$filename=$_FILES[$fielName]['name'];
		$tmpname=$_FILES[$fielName]['tmp_name']; 
		$exp=explode('.', $filename);
		$ext=end($exp);
		$newname=  $exp[0].'_'.time().".".$ext; 
		$config['upload_path'] = 'assets/images/';
		$config['upload_url'] =  base_url().'assets/images/';
		$config['allowed_types'] = "gif|jpg|jpeg|png|ico";
		$config['max_size'] = '2000000'; 
		$config['file_name'] = $newname;
		$this->load->library('upload', $config);
		move_uploaded_file($tmpname,"assets/images/".$newname);
		return $newname;
	}
}
?>