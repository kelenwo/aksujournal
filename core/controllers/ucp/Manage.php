<?php
require 'vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

class Manage extends CI_Controller {
  public function __construct()
  {
          parent::__construct();
if(empty($this->session->email)) {
  header('Location:'. base_url().'ucp/login');
} elseif($this->session->position !=='administrator') {
    header('Location:'. base_url());
}
}
        public function index()
        {

$data['title'] = "Admin Panel";
$this->parser->parse('admin/head',$data);
  $this->load->view('admin/index',$data);
        }

public function archives() {
$data['volume'] = $this->user_model->get_volume();
$data['issue'] = $this->user_model->get_issue();
$data['title'] = "Admin Panel - Archives";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/archives',$data);
}

public function count_articles() {
$data['articles'] = $this->user_model->count_articles();
echo $data['articles'];
}
public function articles() {
  $data['archive'] = $this->user_model->get_archive();
  $data['volume'] = $this->user_model->get_volume();
  $data['issue'] = $this->user_model->get_issue();
  $data['article'] = $this->user_model->get_articles();
$data['title'] = "Admin Panel - Articles";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/articles',$data);
}

public function team() {
$data['title'] = "Admin Panel - Editorial Team";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/team',$data);
}

public function users() {
  $data['user'] = $this->user_model->get_user();
$data['title'] = "Admin Panel - Users";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/users',$data);
}

public function settings() {
$data['title'] = "Admin Panel - Settings";
$res = $this->user_model->get_volume();
$ress = $this->user_model->get_issue();
$data['archive'] = $this->user_model->get_archive();
$data['volume'] = $res;
$data['issue'] = $ress;
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/settings',$data);
}

public function submssions() {
$data['submission'] = $this->user_model->get_submissions();
$data['title'] = "Admin Panel - Submissions";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/submissions',$data);
}

public function save_issue() {
$issue = $this->user_model->save_issue();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function get_volume() {
$issue = $this->user_model->get_volumes();
foreach($issue as $issues) {
echo '<option>-Select Volume</option><option value="'.$issues['volume'].'">'.$issues['volume'].'</option>';
}
}

public function get_issue() {
$issue = $this->user_model->get_issues();
foreach($issue as $issues) {
echo '<option value="'.$issues['issue'].'">'.$issues['issue'].'</option>';
}
}

public function update_issue() {
$issue = $this->user_model->update_issue();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function update_user() {
$issue = $this->user_model->update_user();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function save_archive() {
$issue = $this->user_model->save_archive();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function update_archive() {
$issue = $this->user_model->update_archive();
if($issue==true) {
echo 'saved';
} else {
echo 'fail';}
}

public function news() {
$data['news'] = $this->user_model->get_news();
$data['title'] = "Admin Panel - News";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/news',$data);
}

public function update_news() {
$issue = $this->user_model->update_news();
if($issue==true) {
echo 'true';
} else {
echo 'fail';}
}

public function save_volume() {
$volume = $this->user_model->save_volume();
if($volume==true) {
echo 'saved';
} else {
echo 'fail';}
}


public function update_volume() {
$volume = $this->user_model->update_volume();
if($volume==true) {
echo 'saved';
} else {
echo 'fail';}
}

//handles delete button
public function delete_item() {
$del = $this->user_model->delete_item();
if($del==true) {
echo 'true';
} else {
echo $del;}
}

public function publish_article() {
$article = $this->user_model->publish_article();
if($article==true) {
echo 'true';
} else {
echo $article;}
}



public function update_article() {
$article = $this->user_model->update_article();
if($article==true) {
echo 'true';
} else {
echo $article;}
}
//

  public function do_upload(){
//upload contestant passport
if($this->input->post('type') == 'document') {
  //$name = explode($this->input->post('name'),' ');
$config['allowed_types']        = 'pdf';
$config['max_size']             = 10000;
$config['file_name']          =  $this->input->post("title").'.pdf';
$config['upload_path']          = './uploads/articles/publications/';
$this->upload->initialize($config);
        if($this->upload->do_upload("document")){
$document = $this->upload->data('file_name');
echo '
<b><i class="fa fa-check-square-o" style="color:green; font-size:14px;"> File Uploaded successfully</i></b>
<script>
$("#doc").val("'.$document.'");
</script>';
        } else {
          $msg = $this->upload->display_errors();
          echo '
          <i class="fa fa-info-circle" style="color:red;">'.$msg.'</i>';
		}
  } elseif($this->input->post('type') == 'image') {
    $config['allowed_types']        = 'jpg|jpeg|png';
    $config['max_size']             = 10000;
    $config['file_name']          =  $this->input->post("title").'.docx';
    $config['upload_path']          = './uploads/articles/publications/';
    $this->upload->initialize($config);
            if($this->upload->do_upload("document")){
    $document = $this->upload->data('file_name');
    echo '
    <b><i class="fa fa-check-square-o" style="color:green; font-size:14px;"> File Uploaded successfully</i></b>
    <script>
    $("#doc").val("'.$document.'");
    </script>';
            } else {
              $msg = $this->upload->display_errors();
              echo '
              <i class="fa fa-info-circle" style="color:red;">'.$msg.'</i>';
    		}
}
}
}
