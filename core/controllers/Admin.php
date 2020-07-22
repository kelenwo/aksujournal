<?php
class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
//$this->db->db_select('settings');
  }
        public function index()
        {
          $res = $this->user_model->startstop();
          if($res==false){} else{
          $data['start'] = $res->start;
          $data['stop'] = $res->stop;
          }
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
$id = "hello";
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
<<<<<<< HEAD

public function publish_news() {
$news = $this->user_model->publish_news();
if($news==true) {
echo 'true';
} else {
echo $news;}
}

=======
>>>>>>> 4f9893b6dcf0b490ececd17cab4b72646dbd0b19
public function update_article() {
$article = $this->user_model->update_article();
if($article==true) {
echo 'true';
} else {
echo $article;}
}
//
public function get_contestant() {
//select student bio from db based on logged in registration number
/*$res = $this->admin_model->get_student_info();
if($res==false) {
  echo 'false';
} else{
$data = get_object_vars($res);
$data['title'] = "Eportals - Update Biodata";
$data['loading'] = '<img heigth="15" width="15" src="'.base_url().'theme/assets/img/loading.gif" />';
*/
  $this->parser->parse('admin/get_biodata');

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
  public function edit_contestant() {
$data['title'] = "Admin Panel - Settings";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/edit_contestant',$data);
  }
  public function get_biodata() {
//select student bio from db based on logged in registration number
$res = $this->user_model->get_biodata();
if($res==false) {
  echo 'The user id do not exist';
} else{
$data = get_object_vars($res);
  $this->parser->parse('admin/get_biodata',$data);
}
}
  public function add_voters() {
  //  var_dump(base_url().'vendor/php-excel-reader/excel_reader2.php');
$data['title'] = "Admin Panel - Add Voters";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/add_voter',$data);
  }
  public function upload_excel()
        {
//upload excel file
require_once(APPPATH.'vendor/excel_reader2.php');
require_once(APPPATH.'vendor/SpreadsheetReader.php');
  $config['upload_path']          = './uploads/';
  $config['allowed_types']        = 'xlsx';
  $config['max_size']             = 100;
  $this->upload->initialize($config);

  if ( ! $this->upload->do_upload('userfile'))
  {
      echo $this->upload->display_errors();
  }
  else
  {
        $targetPath = $this->upload->data('full_path');
        $Reader = new SpreadsheetReader($targetPath);
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {

$data = array(
  'name' => $this->db->escape_str($Row[0]),
  'reg_number' => $this->db->escape_str($Row[1]),
  'department' => $this->db->escape_str($Row[2]),
  'phone' => $this->db->escape_str($Row[3]),
  'email' => $this->db->escape_str($Row[4]),
);
        $result = $this->user_model->save_voter($data);
             }
             if ($result==true) {
               echo '<h5 class="green">Excel Data Successfully Imported into the Database.</h5>';
             } else {
                 echo '<h5 class="red">Error: A Problem occurred in Importing Excel Data, Please retry.</h5>';
             }
         }
  }
        }


      public function get_code() {
//generate voters pin
        $verify = $this->user_model->verify_voter();
        if($verify==true) {
      $code =  mt_rand(500000,999999);
      $reg = $this->input->post('reg_number');
      $msg = 'Your Voting Pin is:'.$code;
      $row = $this->user_model->get_user();
      $phone = '0'.$row->phone;
      $data = array(
        'username' => 'kelvin68',
        'password' => 'dubemski04',
        'sender' => 'ACESVote',
        "recipient" => $phone,
        "message" => $msg
    //  "balance" => 'true'
  );
      $ch = curl_init('http://justsms.com.ng/components/com_spc/smsapi.php');
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $send = curl_exec($ch);
      curl_close($ch);

            $save_code = $this->user_model->save_code($reg,$code);
          if($save_code==true) {
            echo 'Your voting pin has been sent to your phone';
                  } else {
          echo '<b class="red">An error occurred please retry!!</b>';
}
        } else{
        echo 'Registration Number entered is not registered';
        }
      }
      public function save_contestant() {
$save = $this->admin_model->save_contestant();
if($save==TRUE) {
  echo "saved";
} else { echo 'failed, please retry';}
      }
      public function save_settings() {
//
$save = $this->user_model->save_settings();
if($save==TRUE) {
      echo "saved";
} else { echo 'failed, please retry';}
      }
      public function display() {
    $i = 0;
        $get = $this->user_model->get_position();
        foreach ($get as $post) {
          $val = $post['position'];
          $req = $this->user_model->get_contestants($val);
          if(!empty($req)) {
    $i++;
        echo' <div id="features-sec" class="container set-pad" >

           <div class="row" >
                   <div class="col-lg-12 col-md-12 col-sm-12" data-scroll-reveal="enter from the bottom after 0.5s">
                     <div class="col-md-11 about-contant">
                   <h4 class="header-line" style="text-transform:uppercase;">'.$post['position'].'</h4><div class="alig-center">';
            foreach($req as $res) {
              echo' <div class="col-md-3 col-sm-3">
                       <div class="icon-bx-wraper bx-style-1 p-tb15 p-lr10">
                           <div class="align-center box">
                             <div class="box-square">
                       <img  id="img" src="'.base_url().'uploads/'.$res['passport'].'">
               </div></div><div class="text-center"> <h5 class="h5 bold text-primary">
                                  '.$res['name'].'
                                 </h5>
                                 <p>Position: '.$res['position'].'<br>
                                   Gender: '.$res['gender'].'</p>
                                 <hr/>
           <a href="#'.$res['id'].'" data-toggle="modal" id="btn-mani" class="btn btn-none btn-primary btn-block">View Manifesto</a>
                         </div>
                     </div>
                   </div>
                  <!-- manifesto -->
                  <div class="modal fade" id="'.$res['id'].'" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-dialog-centered" role="document">

                     <div class="modal-content">

                     <div class="modal-header">
                    <h3 class="modal-title text-center">'.$res['name'].' - Manifesto
                  </h3>
                     </div>
                     <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                  <p>'.$res['manifesto'].'</p>
                   </div>
                   </div>
                     </div>
                     <div class="modal-footer">

                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal" >CLOSE</button>

                     </div>
                  </div>
                  </div>
                     </div>

                  <!-- manifesto end -->
    ';}
                  echo '</div>
                  </div>
              </div>
                   </div>
    </div></div>';
    }
      }
          }
}
