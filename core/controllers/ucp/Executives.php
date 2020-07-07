<?php
Class Executives Extends CI_Controller{
    public function index()
    {
        $data['title'] = "Admin Panel - Executives";
$this->form_validation->set_rules('avatar', 'Avatar', 'callback_avatar_check');
$this->form_validation->set_rules('name', 'Name', 'callback_name_check');

        if ($this->form_validation->run('executives') == FALSE)
            {
                $this->load->view('admin/head', $data);
                $this->load->view('admin/exec');
                $this->load->view('admin/end');
            }
            else
            {

$new_name = 'IMG_'.str_replace(' ', '_', $this->input->post('name'));
$ext = '.jpg';
$config['file_name']          =  $new_name . $ext;
$config['upload_path']          = './theme/';
$config['allowed_types']        = 'gif|jpg|png|jpeg';
$config['max_size']             = 1000;
$config['max_width']            = 1024;
$config['max_height']           = 768;
$this->upload->initialize($config);

    $this->load->view('head', $data);
    $nname = "avatar";
    if ( ! $this->upload->do_upload($nname))
            {
                    $error = $this->upload->display_errors();
                    echo $error;
                }
            else
            {
$this->faculty_model->new_exec();
$this->load->view('success');
            }

    $this->load->view('end');
}
            }

    public function avatar_check($str)
    {
$allowed_mime_type_arr = array('image/gif', 'image/jpg', 'image/jpeg','image/png','image/x-png');
$mime = get_mime_by_extension($_FILES['avatar']['name']);
if(isset($_FILES['avatar']['name']) && $_FILES['avatar']['name'] != "") {
    if(in_array($mime, $allowed_mime_type_arr)) {
        return TRUE;
    } else {
     $this->form_validation->set_message('avatar_check', 'Invalid file format, you can only upload gif/jpg,png formats');
        return FALSE;
    }
} else {
    $this->form_validation->set_message('avatar_check', 'Invalid file selected, please select a file');
    return FALSE;

}
    }
    public function name_check($str) {
        $query = $this->faculty_model->name_check();

        if($query == TRUE){
            $this->form_validation->set_message('name_check', 'This Person Has Already been added, check again.');
            return FALSE;
        }
        else {
        return true;
        }

            }

}
