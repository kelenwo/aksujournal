<?php
Class Login Extends CI_Controller{

    function index(){

            $login =  array(
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->form_validation->set_rules('email', 'Email', 'callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'callback_password_check');

        if ($this->form_validation->run('login') == FALSE)
            {
              $data['title'] = 'Login';
                  $this->load->view("login", $data);
    }
         else {
             $res = $this->user_model->login_user();
                $data['mail'] = $_SESSION['user_email'];
               $this->session->set_userdata('userid', $res->id);
               $this->session->set_userdata('user_email',$res->email);
               $this->session->set_userdata('user_name',$res->name);
               $this->session->set_userdata('user_rights',$res->rights);
               $this->session->set_userdata('user_mobile',$res->mobile);

               header('Location:'. base_url().'ucp');

             }
    }

        public function email_check($str) {
            $query = $this->user_model->email_check();

            if($query == FALSE){
                $this->form_validation->set_message('email_check', 'Invalid Email Address.');
                return FALSE;
            }
            else {
            return true;
            }

                }
        public function password_check($str) {

            $req = $this->user_model->password_check();
            $passcheck = password_verify($this->input->post('password'), $req->password);

            if(empty(form_error('email'))) {
            if($passcheck) {
                return TRUE;
            }
            else{
                $this->form_validation->set_message('password_check', 'Your password is incorrect');
                return FALSE;

                    }
        }
    }
}
