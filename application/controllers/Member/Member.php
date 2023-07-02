<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type: application/json; charset=utf-8');
class Member extends CI_Controller {
 
 public function create(){
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $username = $this->input->post('username');
    $mobileno = $this->input->post('mobileno');
    $address = $this->input->post('address');
    $institute_name = $this->input->post('institute_name');

    if($name == ''){
        $response = array('message'=> 'Name required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    if($email == ''){
        $response = array('message'=> 'Email required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    if($username == ''){
        $response = array('message'=> 'Username required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    if($mobileno == ''){
        $response = array('message'=> 'Mobile No required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    if($address == ''){
        $response = array('message'=> 'Address required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    if($institute_name == ''){
        $response = array('message'=> 'Institute Name required','code'=> 400);
        echo json_encode($response);
        return false;
    }
    $this->load->model('Commn');
    $Common = new Commn();
    $alrdy_email = $Common->get_row('erp_member',array('email' => $email));
    $alrdy_username = $Common->get_row('erp_member',array('username' => $username));
    $alrdy_mobileno = $Common->get_row('erp_member',array('mobileno' => $mobileno));

    if($alrdy_email){
        $response = array('message'=> 'Email already exist','code'=> 400);
        echo json_encode($response);
        return false;        
    }
    if($alrdy_username){
        $response = array('message'=> 'Username already exist','code'=> 400);
        echo json_encode($response);
        return false;        
    }
    if($alrdy_mobileno){
        $response = array('message'=> 'Mobile no already exist','code'=> 400);
        echo json_encode($response);
        return false;        
    }

    $password = $username.'@'.rand(10,100);
    $data =  array(
        'name' =>  $name,
        'email' => $email,
        'username' => $username,
        'mobileno' => $mobileno,
        'address' => $address,
        'password' => md5($password),
        'status' => 0
    );
    $this->mail_send($email);

 }

 public function mail_send($toemail){

    $this->load->library('email');
    $config = array();
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_user'] = 'sumitkachariya03@gmail.com';
    $config['smtp_pass'] = '@Sumit049';
    $config['smtp_port'] = 465;
    // $config['smtp_crypto'] = 'tls';
    // $config['mailtype'] = 'html';
    // $config['charset'] = 'iso-8859-1';
    // $config['wordwrap'] = TRUE;
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");


    $from_email = "sumitkachariya03@gmail.com";
    //Load email library
    $this->email->from($from_email, 'Identification');
    $this->email->to($toemail);
    $this->email->subject('Send Email Codeigniter');
    $this->email->message('The email send using codeigniter library');
    //Send mail
    if($this->email->send()){
        echo 'sent';
    }else{
        echo "<pre>";print_r($this->email->print_debugger());
        echo 'not sent';
    }
 }

}
?>