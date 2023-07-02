<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Commn');
        $Common =  new Commn();
        $maintenance = maintenance();
        if($maintenance == 0){
            $id = $this->session->userdata('id');
            if(!empty($id)){
                redirect('jalmit-admin/dashboard');
            }
        }else{
            redirect('maintenance');
        }
    }
	public function index()
	{
		$this->load->view('jalmitadmin/credentials/header');
		$this->load->view('jalmitadmin/credentials/login');
		$this->load->view('jalmitadmin/credentials/footer');
	}
    
    public function check_auth(){
        $Common =  new Commn();
        $authHeader = $this->input->get_request_header("token");
        $is_verifiy = $this->token_auth($authHeader);
        if($is_verifiy == true){
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if($email == ''){
                $response = array('message'=> 'email field is required','code'=> 400);
                echo json_encode($response);
                return false;    
            }
            if($password == ''){
                $response = array('message'=> 'Password field is required','code'=> 400);
                echo json_encode($response);
                return false;
            }
            $result = $Common->get_row_data('admin', array('username' => $email));
            if(empty($result)){
                $result = $Common->get_row_data('admin', array('email' => $email));
            }
            if(isset($result) && !empty($result)){
                if($result->password != md5($password)){
                    $response = array('message'=> 'Password is wrong','code'=> 400);
                    echo json_encode($response);
                    return false;
                }
                if($result->status == 0){
                    $response = array('message'=> 'You are blocked','code'=> 400);
                    echo json_encode($response);
                    return false;
                }
                $this->session->set_userdata('id', $result->id);
                $response = array('message'=> 'Successfully Login','data'=> $result,'code'=> 200);
                echo json_encode($response);
            }else{
                $response = array('message'=> 'username and Password is wrong','code'=> 404);
                echo json_encode($response);
                return false;
            }
        }    
    }
    private function token_auth($authHeader){
        $Common =  new Commn();
        if($authHeader == ''){
            $response = array('message'=> 'Token field is required','code'=> 400);
            echo json_encode($response);
			return false;
        }
        $get_staff = $Common->get_row_data('admin', array('token' => $authHeader));
        
        if(empty($get_staff)){
            $response = array('message'=> 'token is wrong','code'=> 404);
            echo json_encode($response);
			return false;                        
        }
        if(isset($get_staff) && !empty($get_staff)){
            if($get_staff->status == 0){
                $response = array('message'=> 'token is expire','code'=> 404);
                echo json_encode($response);
    			return false;
            }
        }    
        return true;    
    }
}
