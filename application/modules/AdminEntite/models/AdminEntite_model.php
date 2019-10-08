<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * AdminEntite_model Class extends CI_Model
 */
class AdminEntite_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
    /**
   	  * This function is used to get settings 
		 */
	public function deleteEntite($id) {
		$this->db->where('ID_ENTITE', $id);  
		$this->db->delete('jt_entite'); 
	}	 

	public function deleteUserEntite($id) {
		$this->db->where('ID_ENTITE', $id);
		$this->db->delete('jt_user_entite'); 
	}	 

	public function getEntites($user_id) {
		$sql = "select A.ID_ENTITE as ID, B.ID_ENT_JETEPAY, B.DATE_MOD AS DATE_MOD, B.ADMINISTRATEUR as ADMINISTRATEUR,  B.BENEFICIAIRE AS BENEFICIAIRE, B.GESTIONNAIRE AS GESTIONNAIRE,
		B.ID_ENTITE_OFF AS ID_ENTITE_OFF, B.ID_ADR1 AS ADR1, B.ID_ADR2 AS ADR2, B.ADR3 AS ADR3, B.ADR4 AS ADR4, B.ADR5 AS ADR5,
		B.ADR6 AS ADR6, B.AD_WEB AS AD_WEB, B.AD_LOGO AS AD_LOGO, B.DATE_DEB AS DATE_DEB, B.DATE_FIN AS DATE_FIN, B.BENE_IBAN AS IBAN
		from jt_user_entite as A, jt_entite as B where A.ID_UUSER ='$user_id' and A.ID_ENTITE = B.ID_ENTITE";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getDatatableEntites($user_id) {
		$sql = "select A.ID_ENTITE, B.ID_ENT_JETEPAY, B.DATE_MOD, B.ADMINISTRATEUR,  B.BENEFICIAIRE, B.GESTIONNAIRE,
		B.ID_ENTITE_OFF, B.ID_ADR1, B.ID_ADR2, B.ADR3, B.ADR4, B.ADR5,
		B.ADR6, B.AD_WEB, B.AD_LOGO, B.DATE_DEB, B.DATE_FIN, B.BENE_IBAN
		from jt_user_entite as A, jt_entite as B where A.ID_UUSER ='$user_id' and A.ID_ENTITE = B.ID_ENTITE";
		//print_r($sql);
		//exit();
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
	
}?>