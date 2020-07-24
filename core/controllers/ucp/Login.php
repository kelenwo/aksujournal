<?php
Class Login Extends CI_Controller{


  public function index() {
  $this->load->view('admin/login');
  }
  public function logins() {
  $login = $this->user_model->login();
  if($login==false) {
    echo 'Invalid Email/Password';
  }
  else{
  $pass = $this->input->post('password');
  if(password_verify($pass,$login->password)) {
    $res = get_object_vars($login);
  $store =  $this->session->set_userdata($res);
    echo 'true';
  } else { echo 'Inavlid Password';}
  }
}
  public function logout() {
  session_destroy();
    header('Location:'.base_url());
  }
}
