<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $maintenance = maintenance();
        if($maintenance == 0){
            $id = $this->session->userdata('id');
            if(empty($id)){
                redirect('jalmit-admin');
            }
        }else{
            redirect('maintenance');
        }
        $this->load->model('Commn');
    }

    public function index(){
        $Common =  new Commn();
        $data['user_id'] = $this->session->userdata('id');
        $data['user'] = $this->common_data($data['user_id']);
       
        $this->load->view('jalmitadmin/dashboard/header',$data);
        $this->load->view('jalmitadmin/dashboard/dashboard',$data);
        $this->load->view('jalmitadmin/dashboard/footer',$data);
    }

    public function change(){
        $Common =  new Commn();
        $status = $this->input->post('status');
        $id = $this->session->userdata('id');
        $res = $Common->update_data('admin',array('maintenance' => $status),array('id' => $id));
        if($res){
            $response = array('message'=> 'Successfully Updated','code'=> 200);
            echo json_encode($response);
        }else{
            $response = array('message'=> 'Somthing Wrong','code'=> 400);
            echo json_encode($response);
        }
    }

    public function logout(){
        $this->session->unset_userdata('id');
        redirect('jalmit-admin');
    }
    private function common_data($user_id){
        $Common =  new Commn();
        $result = get_field('admin',array('id' =>$user_id),'*');

        if(isset($result) && !empty($result)){
            if($result->status == 0){
                $response = array('message'=> 'you are blocked','code'=> 404);
                echo json_encode($response);
                return false;
            }else{
                $response = array('data'=> $result,'code'=> 200);
                return ($result);
            }
        }
        return true;
    }
    // private function get_parivar_details($hrms_user_id){
    //     $result = get_field('hrms_user',array('id' =>$hrms_user_id),'*');
    //      return ($result);
    // }
}
?>