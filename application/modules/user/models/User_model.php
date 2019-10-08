<?php
class User_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	  	$this->load->database();
	}

	/**
      * This function is used authenticate user at login

	*/
	function OrderAppGetUserData($email, $password) {
	    $this->db->where("user_id='$email'");       
	    $result = $this->db->get('user_tbl')->result();
	    if(!empty($result)){
	        if ($password == $result[0]->password) {
	            return $result;
	        }
	        else {
	            return false;
	        }
	    } else {
	        return false;
	    }
	}

	function getProductList($OrganizationName)
	{
	    $this->db->where("OrganizationName='$OrganizationName'");  
	    $data = $this->db->get('product_tbl');
	    return $data->result();
	}


	function OrderAppGetResultData($postdata) {

	    $email = $postdata["email"];
	    $searchText = $postdata["searchText"];
	    $searchType = $postdata["searchType"];
	    
	    $sql = "";
	    
	    if($searchType == "item")
	        $sql = "select A.pid,A.OrganizationName,A.Item,A.ItemDescription,A.CrossReference,A.OnHandsQtd,A.Uom,A.Subinventary,A.Location,A.CustPrice,A.SellingPrice,A.image from product_tbl A, user_tbl B where A.OrganizationName = B.OrganizationName and B.user_id = '".$email."' and (A.Item LIKE '%".$searchText."%' or A.CrossReference LIKE '%".$searchText."%')";
	    else if($searchType == "desc")
	        $sql = "select A.pid,A.OrganizationName,A.Item,A.ItemDescription,A.CrossReference,A.OnHandsQtd,A.Uom,A.Subinventary,A.Location,A.CustPrice,A.SellingPrice,A.image from product_tbl A, user_tbl B where A.OrganizationName = B.OrganizationName and B.user_id = '".$email."' and A.ItemDescription LIKE '%".$searchText."%'";
	    $result = $this->db->query($sql);
	    
	    return $result->result();
	}


function InsertNewOrderList($postdata) {
	
    $filename = "assets/images/";
    $email = $postdata["email"];
    $signatureData = json_decode($postdata["signatureData"]);
    $order_list = json_decode($postdata["order_list"]);
    
    $this->db->where("user_id='$email'");       
    $result = $this->db->get('user_tbl')->result();
    $uid = $result[0]->uid;

    $sql = "select max(oid) as oid from order_tbl";
    $result = $this->db->query($sql)->result();
    $oid = 1;
    if(!is_null($result[0]->oid))
        $oid =$result[0]->oid+1;

    $sql = "select max(sid) as sid from signature_tbl";
    $result = $this->db->query($sql)->result();
    $sid = 1;
    if(!is_null($result[0]->sid))
        $sid =$result[0]->sid+1;    

    for($i=0;$i<count($order_list);$i++)
    {
        $data = array(
            'oid'=>$oid,
            'uid'=>$uid,
            'pid'=>$order_list[$i]->pid,
            'count'=>$order_list[$i]->count,
            'image1'=>'',
            'image2'=>'',
            'image3'=>'',
            'unit'=>$order_list[$i]->unit
        );
        $this->db->insert('order_tbl',$data);
        for($j=0;$j<3;$j++)
        {
            $endName="";
            $image="";
            if($j==0)
            {
                $image = $order_list[$i]->image1;
                $endName = "image1";
            }
            else if($j==1)
            {
                $image = $order_list[$i]->image2;
                $endName = "image2";
            }
            else if($j==2)
            {
                $image = $order_list[$i]->image3;
                $endName = "image3";
            }
            if($image!="")
            {
                $comma = strpos($image, ',') + 1;
                $slash = strpos($image, '/') + 1;
                $image_type = substr($image, $slash, strpos($image, ';') - $slash);
                $image = substr($image, $comma);
                $decoded_image = base64_decode($image);                 
                $filename .= $oid.'_'.$uid.'_'.$order_list[$i]->pid.'_'.$endName.'.' . $image_type;
                $dbFileName = $oid.'_'.$uid.'_'.$order_list[$i]->pid.'_'.$endName.'.' . $image_type;
                if (file_exists($filename)) unlink($filename);

                $successful = file_put_contents($filename, $decoded_image);

                if ($successful) {
                    $array = array('oid' => $oid, 'uid' => $uid, 'pid' => $order_list[$i]->pid);
                    $data = array($endName=>$dbFileName);
                    $this->db->where($array);
                    $this->db->update("order_tbl", $data);                      
                }
            }
        }
    }
    $data = array(
        'sid'=>$sid,
        'oid'=>$oid,
        'signature'=>"",
        'buildingName'=>$signatureData->buildingName,
        'address'=>$signatureData->address,
        'name'=>$signatureData->name,
        'idNumber'=>$signatureData->idNumber,
        'telephone'=>$signatureData->telephone
    );
    $this->db->insert('signature_tbl',$data);
    
    $image = $signatureData->signatureImage;
    $comma = strpos($image, ',') + 1;
    $slash = strpos($image, '/') + 1;
    $image_type = substr($image, $slash, strpos($image, ';') - $slash);
    $image = substr($image, $comma);
    
    $decoded_image = base64_decode($image);

    $filename .= $sid.'_'.$oid.'_'.$email.'.' . $image_type;
    $dbFileName = $sid.'_'.$oid.'_'.$email.'.' . $image_type;
    if (file_exists($filename)) unlink($filename);

    $successful = file_put_contents($filename, $decoded_image);

    if ($successful) {
        $array = array('oid' => $oid, 'sid' => $sid);
        $data = array("signature"=>$dbFileName);
        $this->db->where($array);
        $this->db->update("signature_tbl", $data);  
    }
    return "Success";
}
























}