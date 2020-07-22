<?php
class Home extends CI_Controller {

        public function index()
        {
           $data['title'] = "NUESA - Vote";
                // $this->load->view('head', $data);
$data['name'] = $this->session->name;
$this->load->view('head', $data);
$this->load->view('index',$data);
$this->load->view('end');
        }
public function hi() {
  echo 'hello';
}
public function download($articles,$publications,$filename = NULL) {
    // read file contents
    $data = file_get_contents(base_url('/uploads/articles/publications/'.$filename));
    force_download($filename, $data);
}
    }
