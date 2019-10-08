<?php defined("BASEPATH") OR exit("No direct script access allowed");

class AdminUser extends CI_Controller {

  	function __construct() {
	    parent::__construct();
	    //Checking user is login or not 
	    is_login();
		$this->load->model("AdminUser_model");
  	}

  	/**
   	* Load AdminUser view page
	*/

	public function index() {
		$this->load->view('include/header');
		$data = $this->session->get_userdata();
		$user_id = $data['user_details'][0]->ID_UUSER;

		$users = $this->AdminUser_model->getUsers($user_id);

		$data['result'] = $users;
		$this->load->view('index',$data);
	    $this->load->view('include/footer');
	}

    public function delete($id){
        is_login(); 
		$ids = explode('-', $id);
		
        foreach ($ids as $id) {
			// $this->AdminUser_model->deleteUser($id);
			$entiteID = $this->AdminUser_model->getEntiteID($id);
			// $this->AdminUser_model->deleteUserEntite($id);

            // $this->AdminUser_model->deleteEntite($entiteID);
		}
		redirect(base_url().'AdminUser', 'refresh');
	}
	
	public function add_edit() {
		is_login();
		$data = $this->input->post();
		$userdata = $this->session->get_userdata();
		$user_id = $userdata['user_details'][0]->ID_UUSER;

		$data['ID'] = $this->input->post('ID');
		$data['ID_USER'] = $user_id;

		$data['DATE_MOD'] = date("Y-m-d H:i:s");  
		if ($data['uADMINISTRATEUR'] == "on") $data['uADMINISTRATEUR'] = 'O'; else $data['uADMINISTRATEUR'] = 'N';
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

		$ADR3 = $data['ADR3'];
		if($id = $this->input->post('ID')) {
			unset($data['edit']);
			$sqlUser = "UPDATE jt_user SET MAILPSEUDO = '".$data['MAILPSEUDO']."' , DATE_MOD = '".$data['DATE_MOD']."' 
			, ID_USER='".$data['ID_USER']."' WHERE ID_UUSER = '".$data['ID']."'";
			$this->db->query($sqlUser);

			$sqlUserEntite = "UPDATE jt_user_entite SET DATE_MOD='".$data['DATE_MOD']."' , DATE_DEB = '".$data['DATE_DEB']."' 
			, DATE_FIN = '".$data['DATE_FIN']."' , ADMINISTRATEUR = '".$data['uADMINISTRATEUR']."' 
			WHERE ID_UUSER = '".$data['ID_USER']."' AND ID_ENTITE = '".$data['ID_ENTITE']."'";
			$this->db->query($sqlUserEntite);
			
			$entiteData['ADMINISTRATEUR'] = $data['ADMINISTRATEUR'];
			$entiteData['BENEFICIAIRE'] = $data['BENEFICIAIRE'];
			$entiteData['GESTIONNAIRE'] = $data['GESTIONNAIRE'];
			$entiteData['DATE_MOD'] = $data['DATE_MOD'];
			$entiteData['ID_ADR1'] = $data['ADR1'];
			$entiteData['ID_ADR2'] = $data['ADR2'];
			$entiteData['ADR3'] = $data['ADR3'];
			$entiteData['ADR4'] = $data['ADR4'];
			$entiteData['ADR5'] = $data['ADR5'];
			$entiteData['ADR6'] = $data['ADR6'];
			$entiteData['AD_WEB'] = $data['AD_WEB'];
			$entiteData['AD_LOGO'] = $data['AD_LOGO'];

			$this->AdminUser_model->updateRow('jt_entite', 'ID_ENTITE', $data['ID_ENTITE'], $entiteData);
			$this->session->set_flashdata('message', 'Your data updated Successfully..');
      		redirect(base_url().'AdminUser'); 
		} else {
			unset($data['add']);
			redirect(base_url().'AdminUser'); 
		}
	}

    public function dataTable (){
		is_login();

		$data = $this->session->get_userdata();
		$user_id = $data['user_details'][0]->ID_UUSER;

$table = <<<EOT
(
SELECT A.ID_UUSER as ID, B.ID_ENTITE as ID_ENTITE, A.MAILPSEUDO as MAILPSEUDO, B.DATE_DEB as DATE_DEB, B.DATE_FIN AS DATE_FIN, 
B.ADMINISTRATEUR AS uADMINISTRATEUR, C.ADMINISTRATEUR AS ADMINISTRATEUR, C.BENEFICIAIRE AS BENEFICIAIRE,
C.GESTIONNAIRE AS GESTIONNAIRE, C.ID_ENTITE_OFF AS ID_ENTITE_OFF, C.ID_ADR1 AS ADR1, C.ID_ADR2 AS ADR2, C.ADR3 AS ADR3,
C.ADR4 AS ADR4, C.ADR5 AS ADR5, C.ADR6 AS ADR6, C.AD_WEB AS AD_WEB, C.AD_LOGO AS AD_LOGO 
from jt_user as A, jt_user_entite as B, jt_entite as C where A.ID_UUSER = B.ID_UUSER and B.ID_ENTITE = C.ID_ENTITE
) temp
EOT;

		$primaryKey = 'ID';

    	$columns = array(
            array( 'db' => 'ID', 'dt' => 0 ),
			array( 'db' => 'MAILPSEUDO', 'dt' => 1 ),
			array( 'db' => 'DATE_DEB', 'dt' => 2 ),
			array( 'db' => 'DATE_FIN', 'dt' => 3 ),
            array( 'db' => 'uADMINISTRATEUR', 'dt' => 4 ),
            array( 'db' => 'ADMINISTRATEUR', 'dt' => 5 ),
            array( 'db' => 'BENEFICIAIRE', 'dt' => 6 ),
			array( 'db' => 'GESTIONNAIRE', 'dt' => 7 ),
			array( 'db' => 'ID_ENTITE_OFF', 'dt' => 8 ),
			array( 'db' => 'ADR1', 'dt' => 9 ),
            array( 'db' => 'ADR2', 'dt' => 10 ),
            array( 'db' => 'ADR3', 'dt' => 11 ),
			array( 'db' => 'ADR4', 'dt' => 12 ),
			array( 'db' => 'ADR5', 'dt' => 13 ),
			array( 'db' => 'ADR6', 'dt' => 14 ),
			array( 'db' => 'AD_WEB', 'dt' => 15 ),
			array( 'db' => 'AD_LOGO', 'dt' => 16 ),
            array( 'db' => 'ID', 'dt' => 17 )
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
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a id="btnEditRow" class="modalButtonUser mClass"  href="javascript:;" type="button" data-src="'.$id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
			$output_arr['data'][$key][count($output_arr['data'][$key])  - 1] .= '<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId(\''.$id.'\', \'AdminUser\')" data-target="#cnfrm_delete" title="delete"><i class="fa fa-trash-o" ></i></a>';
			$output_arr['data'][$key][0] = '<input type="checkbox" name="selData" onclick="selectRow(this)" value="'.$output_arr['data'][$key][0].'">';
		}
		echo(json_encode($output_arr));

	}

	/**
     * This function is used to show popup of user to add and update
     * @return Void
    */

    public function get_user() {
        is_login();
        if($this->input->post('id')){
			$data['userData'] = getUserDataByid($this->input->post('id'));
			
            echo $this->load->view('add_user', $data, true);
        } else {
            echo $this->load->view('add_user', '', true);
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