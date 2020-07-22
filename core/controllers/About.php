<?php
class About extends CI_Controller {

	
	public function index()
	{
		$this->load->view('header');
        $this->load->view('about1');
        $this->load->view('footer');
	}
	public function scope()
	{
		$this->load->view('header');
        $this->load->view('about2');
        $this->load->view('footer');
	}
}
?>