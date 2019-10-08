<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * AdminUser_model Class extends CI_Model
 */
class AdminUser_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
	

	public function deleteUser($id) {
		$this->db->where('ID_UUSER', $id);  
		$this->db->delete('jt_user'); 
	}
	
	public function deleteUserEntite($id) {
		$this->db->where('ID_UUSER', $id);
		$this->db->delete('jt_user_entite'); 
	}

    /**
   	  * This function is used to get settings 
	*/

	public function deleteEntite($id) {
		$this->db->where('ID_ENTITE', $id);  
		$this->db->delete('jt_entite'); 
	}

	public function getUsers($user_id) {
		$sql  = "select A.ID_UUSER as ID_USER, A.MAILPSEUDO as MAILPSEUDO, B.DATE_DEB as DATE_DEB,
B.DATE_FIN AS DATE_FIN, B.ADMINISTRATEUR AS uADMINISTRATEUR, C.ADMINISTRATEUR AS ADMINISTRATEUR, C.BENEFICIAIRE AS BENEFICIAIRE,
C.GESTIONNAIRE AS GESTIONNAIRE, C.ID_ENTITE_OFF AS ID_ENTITE_OFF, C.ID_ADR1 AS ID_ADR1, C.ID_ADR2 AS ID_ADR2, C.ADR3 AS ADR3,
C.ADR4 AS ADR4, C.ADR5 AS ADR5, C.ADR6 AS ADR6, C.AD_WEB AS AD_WEB, C.AD_LOGO AS AD_LOGO
 from jt_user as A, jt_user_entite as B, jt_entite as C where A.ID_UUSER = B.ID_UUSER and B.ID_ENTITE = C.ID_ENTITE";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getDatatableEntites($user_id) {
		$sql = "select A.ID_ENTITE, B.ID_ENT_JETEPAY, B.DATE_MOD, B.ADMINISTRATEUR,  B.BENEFICIAIRE, B.GESTIONNAIRE,
		B.ID_ENTITE_OFF, B.ID_ADR1, B.ID_ADR2, B.ADR3, B.ADR4, B.ADR5,
		B.ADR6, B.AD_WEB, B.AD_LOGO, B.DATE_DEB, B.DATE_FIN, B.BENE_IBAN
		from jt_user_entite as A, jt_entite as B where A.ID_UUSER ='$user_id' and A.ID_ENTITE = B.ID_ENTITE";

		$query = $this->db->query($sql);
		return $query->result_array();
		//return $this->db->get('jt_user_entite')->result();
    }
 	
	/**
   	  * This function is used to insert data in table
   	  * @param : $table - table name in which you want to insert record
   	  * @param : $data - data array 
   	  */
	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
	  	return  $this->db->insert_id();
	}

  	/**
   	  * This function is used to update data in specific table
   	  * @param : $table - table name in which you want to update record
   	  * @param : $col - field name for where clause 
   	  * @param : $colVal - field value for where clause
   	  * @param : $data - data array 
	*/

  	public function updateRow($table, $col, $colVal, $data) {

		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;

	}

	public function getEntiteID($userid) {
		
		$data = $this->db->query("select ID_ENTITE from jt_user_entite where ID_UUSER = '$userid'");
		$data = $data->result_array();
		return $data[0]['ID_ENTITE'];
	}
	
}?>