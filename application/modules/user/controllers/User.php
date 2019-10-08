<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('User_model');
    }

   function OrderAppLogin(){
        $postdata = $this->input->post();
        
        if(empty($postdata)){
            echo json_encode(array("error"=>"invalid arguments"));
            exit(0);
        }
        if( is_null($postdata["email"]) || is_null($postdata["password"]) ) {
           echo json_encode(array("error"=>"invalid arguments - 702"));
           exit(0);
        }

        if ($postdata["email"]       == "" || 
            $postdata["password"]    == "" ){
            echo json_encode(array("response"=>"invalid arguments - 703"));
            exit(0);
        }else{            
            $userData = $this->User_model->OrderAppGetUserData($postdata['email'],$postdata['password']);
            if(empty($userData)) { 
                echo json_encode(array("response"=>"UserAuthError"));
                exit(0);
            } else { 
                echo json_encode($userData);
                $data = $this->User_model->getProductList($userData[0]->OrganizationName);
                echo json_encode(array("response"=>"Success","OrganizationName"=>$userData[0]->OrganizationName,"data"=>$data),JSON_UNESCAPED_UNICODE);
                exit();
            }
            exit(0);
        }

        echo json_encode(array("error"=>"Server error, contact your sys admin."));
        exit(0);
    }


   
    public function OrderAppSearchText($page =''){

        $postdata = $this->input->post();
        $return = $this->User_model->OrderAppGetResultData($postdata);
        echo json_encode(array("data"=>$return));
        exit();
    }
    
    public function InsertNewOrderList($page =''){    

        $postdata = $this->input->post();
        $return = $this->User_model->InsertNewOrderList($postdata);
        echo json_encode(array("response"=>"Success"));
        exit();
    }

    function api_auth(){

        // FOR TEST ONLY 

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400'); 
        }
     
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
     
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
     
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        
            exit(0);
        }
     
        $postdata = $this->input->post();
       
        if(empty($postdata)){
            echo json_encode(array("error"=>"invalid arguments - 701"));
            exit(0);
        }

        
        $request = json_decode($postdata, true);

        if(!is_array($request)){
            echo json_encode(array("error"=>"invalid data"));
            exit(0);
        }

        if(!array_key_exists("email", $request) &&
           !array_key_exists("password", $request) &&
           !array_key_exists("country", $request) ) {

           echo json_encode(array("error"=>"invalid arguments - 702"));
           exit(0);
        }


        if ($request['email']       == "" || 
            $request['password']    == "" ||
            $request['country']     == ""   ){
                            
            echo json_encode(array("response"=>"invalid arguments - 703"));
            exit(0);
                         
        }else{
            echo json_encode( array("userData"  =>"Success",
                                    "email"     =>$request['email'],
                                    "password"  =>$request['password'],
                                    "country"   =>$request['country']));
            exit(0);
        }
        
        echo json_encode(array("error"=>"server error, contact your sys admin."));

    }


    public function test(){
        echo json_encode(array("response"=>"API Running")); 
    }


}