<?php
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
var_dump($links);
$data['issue'] = $this->user_model->get_issue_url($links);
$this->load->view('header');
$this->parser->parse('openarchive',$data);
$this->load->view('footer');
    }
    public function editorial_policy()
    {
$this->load->view('header');
$this->load->view('editorial_policy');
$this->load->view('footer');
    }
    public function user()
    {
$this->load->view('header');
$this->load->view('user');
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
    $config['upload_path']          = './uploads/articles/publications/';
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
    } elseif($this->input->post('type') == 'image') {
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
      $("#doc").val("'.$image.'");
      </script>';
              } else {
                $msg = $this->upload->display_errors();
                echo '
                <i class="fa fa-info-circle" style="color:red;">'.$msg.'</i>';
          }
    }
    }
    public function viewpdf($filename) {
      //Set header to show as PDF
header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=" . $data["name"]);

//Create a temporary file for Word
$temp = tmpfile();
fwrite($temp, $data["data"]); //Write the data in the file
$uri = stream_get_meta_data($temp)["uri"]; //Get the location of the temp file

//Convert the docx file in to an PhpWord Object
$doc = PhpOffice\PhpWord\IOFactory::load($uri);

//Set the PDF Engine Renderer Path. Many engines are supported (TCPDF, DOMPDF, ...).
\PhpOffice\PhpWord\Settings::setPdfRendererPath("path/to/tcpdf");
\PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');

//Create a writer, which converts the PhpWord Object into an PDF
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($doc, 'PDF');

//Create again an temp file for the new generated PDF.
$pdf_temp = tmpfile();
$pdf_uri = stream_get_meta_data($pdf_temp)["uri"];

//Save the PDF to the path
$xmlWriter->save($pdf_uri);

//Now print the file from the temp path.
echo file_get_contents($pdf_uri);
    }
}
