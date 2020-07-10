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
//
public function add_contestant() {
//select student bio from db based on logged in registration number
//$req = get_object_vars($this->admin_model->get_student_info());
//$data = $req;
$req = $this->user_model->get_position();
$res['position'] = $req;
$data['title'] = "Eportals - Update Biodata";
$this->parser->parse('admin/head',$data);
  $this->parser->parse('admin/add_contestant',$res);
}

public function archives() {
$data['title'] = "Admin Panel - Archives";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/archives',$data);
}

public function articles() {
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
if($this->input->post('type') == 'reg') {
  //$name = explode($this->input->post('name'),' ');
  $id = $this->user_model->get_id();
  $usid = $id + 1;
  if($usid < 10) {
    $uid = '00'.$usid;
  } elseif($usid > 9) {
    $uid = '0'.$usid;
  }
$config['allowed_types']        = 'gif|jpg|png|jpeg';
$config['max_size']             = 1000;
$config['max_width']            = 1024;
$config['max_height']           = 768;
$config['file_name']          =  $uid.'.jpg';
$config['upload_path']          = './uploads/';
$this->upload->initialize($config);
        if($this->upload->do_upload("userfile")){
            $image= $this->upload->data('file_name');
            $data = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'gender' => $this->input->post('gender'),
'position' => $this->input->post('position'),
'manifesto' => $this->input->post('manifesto'),
'passport' => $image,
'id' => $uid,
            );
            $result= $this->user_model->save_contestant($data);
      if($result==true) {

echo "<script>
$('#pan').hide();
$('#msg2').show();
  </script>";
  $this->load->view('admin/success',$data);
} else {
  echo "<script>
  $('#msg2').hide();
  $('#msg').html('An error occurred');
    </script>";
}
        } else {
          $msg = $this->upload->display_errors();
          echo "<script>
          $('#msg2').hide();
          $('#msg').html('.$msg.');
            </script>";
		}
  } elseif($this->input->post('type') == 'edit') {
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name']          =  $this->input->post('passport');
    $config['upload_path']          = './uploads/';
    $this->upload->initialize($config);
          if($this->upload->do_upload("userfile")){
            $data = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'phone' => $this->input->post('phone'),
'gender' => $this->input->post('gender'),
'position' => $this->input->post('position'),
'manifesto' => $this->input->post('manifesto'),
'passport' => $this->input->post('passport'),
'id' => $this->input->post('id')
            );
$result= $this->user_model->update_contestant($data);
        if($result==true) {

    echo '<script>
    $("#return").html("Contestant data successfully updated");
    </script>';
$this->parser->parse('admin/get_biodata');
    } else {
  echo 'An error occured';
    }
  } else {
    echo $this->upload->display_errors();
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


      public function settings() {
$data['title'] = "Admin Panel - Settings";
$res = $this->user_model->startstop();
if($res==false){} else{
$data['start'] = $res->start;
$data['stop'] = $res->stop;
}
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/settings',$data);
      }

      public function submssions() {
$data['title'] = "Admin Panel - Submissions";
$this->parser->parse('admin/head',$data);
$this->parser->parse('admin/submissions',$data);
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
