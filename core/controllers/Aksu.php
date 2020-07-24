<?php
require 'vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

   class Aksu extends CI_Controller {

public function index() {
$data['news'] = $this->user_model->get_news();
 $this->load->view('header');
 $this->parser->parse('home',$data);
 $this->load->view('footer');

      }
     public function signup()
    {

 $this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('name', 'Name', 'callback_name_check');
$this->form_validation->set_rules('phone', 'Phone No', 'required');
$this->form_validation->set_rules('email', 'E-mail',  'required|is_unique[users.email]');

if ($this->form_validation->run() == FALSE)
{
$this->load->view('header');
$this->load->view('signUp');
$this->load->view('footer');
}
else
{
$this->load->view('formsuccess');
}
   }
   public function signin()
    {
$this->load->view('header');
$this->load->view('signIn');
$this->load->view('footer');
    }
    public function contact()
    {
$this->load->view('header');
$this->load->view('contact');
$this->load->view('footer');
    }
    public function archives()
    {
$data['volume'] = $this->user_model->get_volume();
$data['issue'] = $this->user_model->get_issue();
$data['archive'] = $this->user_model->get_archive();
$this->load->view('header');
$this->parser->parse('archives',$data);
$this->load->view('footer');
    }
    public function archive($openarchive,$link)
    {

$links = str_replace('_',' ',explode('-',$link));
$data['archive'] = $links[0].'&nbsp;'.$links[1].'&nbsp;'.$links[2];
$data['article'] = $this->user_model->get_issue_link($links[0],$links[1],$links[2]);
$this->load->view('header');
$this->parser->parse('openarchive',$data);
$this->load->view('footer');
    }

    public function viewarticle($openarchive,$link)
    {

  $links = str_replace('_',' ',explode('-',$link));

  $res = $this->user_model->get_article_link($links[0],$links[1],$links[2]);
  $data = get_object_vars($res);
  $this->load->view('header');
  $this->parser->parse('viewarticle',$data);
  $this->load->view('footer');
    }

    public function editorial_policy()
    {
$this->load->view('header');
$this->load->view('editorial_policy');
$this->load->view('footer');
    }
    public function submission()
    {
$data['hello'] = array();
$this->load->view('header');
$this->parser->parse('submission',$data);
$this->load->view('footer');
    }
    public function who_we_are()
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
    public function editorial_board()
    {
$this->load->view('header');
$this->load->view('about3');
$this->load->view('footer');
    }
    public function subject_areas()
    {
$this->load->view('header');
$this->load->view('about4');
$this->load->view('footer');
    }
     public function openarchive()
    {
$this->load->view('header');
$this->load->view('openarchive');
$this->load->view('footer');
    }

    public function do_upload(){
    //upload contestant passport
    if($this->input->post('type') == 'document') {
    //$name = explode($this->input->post('name'),' ');
    $config['allowed_types']        = 'doc|docx';
    $config['max_size']             = 10000;
    $config['file_name']          =  $this->input->post("title").'.docx';
    $config['upload_path']          = './uploads/articles/submission/';
    $this->upload->initialize($config);
          if($this->upload->do_upload("document")){
    $document = $this->upload->data('file_name');
    echo '
    <b><i class="fa fa-check-square-o" style="color:green; font-size:14px;"> Document Uploaded successfully</i></b>
    <script>
    $("#doc").val("'.$document.'");
    </script>';
          } else {
            $msg = $this->upload->display_errors();
            echo '
            <i class="fa fa-info-circle" style="color:red;">'.$msg.'</i>';
      }
    } elseif($this->input->post('type') == 'verify') {
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['max_size']             = 10000;
      $config['file_name']          =  $this->input->post("title").'-verify.jpeg';
      $config['upload_path']          = './uploads/articles/submission/verification/';
      $this->upload->initialize($config);
              if($this->upload->do_upload("verify")){
      $image = $this->upload->data('file_name');
      echo '
      <b><i class="fa fa-check-square-o" style="color:green; font-size:14px;"> Image Uploaded successfully</i></b>
      <script>
      $("#img").val("'.$image.'");
      </script>';
              } else {
                $msg = $this->upload->display_errors();
                echo '
                <i class="fa fa-info-circle" style="color:red;">'.$msg.'</i>';
          }
    }
    }
    public function viewpdf($archives,$articles,$publications,$file) {
//Create a temporary file for Word
$data = 'C:\wamp64\www\aksu\uploads\20089980GA.pdf';
require 'vendor\autoload.php';

$pdf = new \Mpdf\Mpdf();

//$pdf->SetImportUse();
$pagecount = $pdf->SetSourceFile($data);
    for ($i=1; $i<=$pagecount; $i++) {
        $import_page = $pdf->ImportPage($i);
        $pdf->UseTemplate($import_page);

        if ($i < $pagecount)
            $pdf->AddPage();
    }
$d = $pdf->Output();
echo $d;
    }

    public function viewpdfs($archives,$articles,$publications,$abstract,$file) {
//Create a temporary file for Word
$data = 'C:\wamp64\www\aksu\uploads\20089980GA.pdf';
require 'vendor\autoload.php';

$pdf = new \Mpdf\Mpdf();

//$pdf->SetImportUse();
$pagecount = $pdf->SetSourceFile($data);
$import_page = $pdf->ImportPage(1);
$pdf->UseTemplate($import_page);

echo $pdf->Output();

    }
    public function submit() {
    $article = $this->user_model->submit();
    $data = $this->input->post();
    if($article==true) {
      $config['protocol'] = "sendmail";
      $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);
      $this->email->from($data['email'],$data['author']);
      $this->email->to('kelenwo68@gmail.com');
      $this->email->subject('AKSUJAEERD-'.mb_strtoupper($data['title']));
      $this->email->message(mb_strtoupper($data['title']).'&nbsp; By:'.mb_strtoupper($data['author']));
      $this->email->attach('./uploads/articles/submission/'.$data['document']);
      $this->email->attach('./uploads/articles/submission/verification/'.$data['verify']);
      $send = $this->email->send();
    if($send) {
    echo 'true';
    } else {
      show_error($this->email->print_debugger());
         return false;
    }
    } else {
    echo $article;}
    }

    public function save_user() {
    $volume = $this->user_model->save_user();
    if($volume==true) {
    echo 'saved';
    } else {
    echo 'fail';}
    }

}
