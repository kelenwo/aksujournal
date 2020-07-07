<?php
Class Register Extends CI_Controller{
    public function index()
    {
        $data['title'] = "Admin Panel - Registration";
//$this->form_validation->set_rules('avatar', 'Avatar', 'callback_avatar_check');
$this->form_validation->set_rules('email', 'Email', 'callback_email_check');

        if ($this->form_validation->run('register') == FALSE)
            {
                $this->load->view('head', $data);
                $this->load->view('add');
                $this->load->view('end');
            }
            else
            {
$datestring = date('dmY');
$put = $this->user_model->reg_user();

if($put == TRUE) {
    $this->load->view('head', $data);

    $this->load->view('end');
}
            }
    }

    public function email_check($str) {
        $query = $this->user_model->email_check();

        if($query == TRUE){
            $this->form_validation->set_message('email_check', 'Email Address Already Exist.');
            return FALSE;
        }
        else {
        return true;
        }

            }

}
