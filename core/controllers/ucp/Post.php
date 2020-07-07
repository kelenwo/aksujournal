<?php
class Post extends CI_Controller {
    public function __construct() {
      parent::__construct();

    //Load url Helper

}
        public function index()
        {

            $data['news'] = $this->post_model->req_post();

            $data['title'] = $this->session->user_name;
                 $this->load->view('admin/head', $data);
                $this->load->view('admin/post', $data);
                 $this->load->view('admin/end');
        }
        public function newpost()
        {
            if(!isset($this->session->user_name)) {
                //$link = base_url();
                header('Location:' .base_url(). 'ucp/login');
            }
            $this->form_validation->set_rules('title', 'Title', 'callback_title_check');
            $data['title'] = "Admin Panel - Create New Post";

            if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('head', $data);
                    $this->load->view('new-post');
                    $this->load->view('end');
                }
                else
                {
                    $model_load = $this->post_model->new_post();
                    if($model_load == TRUE) {
                        $this->load->view('head');
                } else {
                    $this->load->view('welcome_message');
                }
            }

    }
    public function title_check($str) {
        $query = $this->post_model->title_check();

        if($query == TRUE){
            $this->form_validation->set_message('title_check', 'A Post with this title already exists!!');
            return FALSE;
        }
        else {
        return true;
        }

            }
}
