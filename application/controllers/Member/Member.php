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
    $this->mail_send($email,$password);

 }

 public function mail_send($toemail,$password){
    $subject = "Password";
    $txt = 'Password: '. $password;
    $headers = "From: sumitkachariya03@gmail.com" . "\r\n" .
    "CC: sumitkachariya03@gmail.com";
    mail($toemail,$subject,$txt,$headers);
 }

}
?>