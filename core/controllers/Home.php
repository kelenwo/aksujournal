<?php
class Home extends CI_Controller {

        public function index()
        {

$this->load->helper('url');
$res = $this->user_model->startstop();
$data['now'] = date("d-F-Y H:i:A");
if($res==false){} else{
$data['start'] = $res->start;
$data['stop'] = $res->stop;
}
             $data['title'] = "NUESA - Vote";
                // $this->load->view('head', $data);
                $data['name'] = $this->session->name;
                      $this->load->view('head', $data);
                      $this->load->view('index',$data);
                      $this->load->view('end');
        }
  public function vote() {
    if(!$this->session->name) {
        header('Location:'.base_url().'#login');
    }
    $data['name'] = $this->session->name;
    $res = $this->user_model->startstop();
    $d = date("d-F-Y H:i:A");
    if($res==false){} else{
    $data['start'] = $res->start;
    $data['stop'] = $res->stop;
    }
    $req = $this->user_model->check_vote();
    if($req==true){
      $dat['voted'] = '<br><hr/><h3 class="red text-center">YOU HAVE ALREADY REGISTERED YOUR VOTES</h3><hr/>';
      $dat['load'] = 'html';

    } else {
      $dat['voted'] = base_url().'home/display';
      $dat['load'] = 'load';
     }
$data['title'] = "ACES E-VOTE - VOTE";
    $this->load->view('head',$data);
    $this->parser->parse('index_vote',$dat);
    $this->load->view('end');
  }
  public function display() {
$i = 0;
    $get = $this->user_model->get_position();
    foreach ($get as $post) {
      $val = $post['position'];
      $req = $this->user_model->get_contestants($val);
      if(!empty($req)) {
$i++;
    echo' <form name="savevote" id="savevote"><div id="features-sec" class="container set-pad" >
             <div class="row text-center">
                  <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                 <h1 data-scroll-reveal="enter from the bottom after 0.1s"  class="header-line" style="text-transform:uppercase;">'.$post['position'].'</h1>
             </div>
         </div>
       <div class="row" >
               <div class="col-lg-12 cent text-center col-md-12 col-sm-12" data-scroll-reveal="enter from the bottom after 0.5s">
                 <div class="col-md-11 about-contant">
              <div class="align-center">';
        foreach($req as $res) {
          echo'<div class="col-md-3 col-sm-3 m-b15">
                <div class="content-bg">
                  <div class="icon-bx-wraper bx-style-1 p-tb15 p-lr10 center">
                    <div class="box">
                      <div class="box-round">
                <img  id="img" src="'.base_url().'uploads/'.$res['passport'].'">
          </div></div>
                          <h5 style="text-transform: capitalize;" class="h5 text-primary">'.$res['name'].'
                          </h5>
                          <p style="text-transform: capitalize;">For '.$res['position'].'</p>
                          <hr/>
                          <a href="#'.$res['id'].'" data-toggle="modal" id="btn-mani" class="btn btn-none btn-primary btn-block">View Manifesto</a>
                          <h4> Vote&nbsp; <i class="fa fa-arrow-right"></i>

                         <label class="toggle">
                                <input name="vote'.$i.'[vote_for_id]" type="radio" value="'.$res['id'].'">

                                  <span class="handle"></span>
                              </label></h4>
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
echo '<hr/></form><div id="msg"></div><hr/>
<button id="save_vote" class="btn btn-success btn-block">SUBMIT VOTE <i id="loadingv" class="fa fa-gear fa-spin"></i></button>
';
      }
      public function save_vote() {
$i = 0;
$votes = $this->input->post();
foreach ($votes as $res) {
$i++;
$vote = $this->input->post('vote'.$i);
$val = $vote['vote_for_id'];
$save = $this->user_model->save_vote($val);
}
//$save = $this->user_model->save_vote();
if($save==3) {
  echo '<h4 class="green text-center">Your vote has been successfully Registered. Please Logout!!</h4>
  <script>
  $("#save_vote").attr("disabled","disabled");</script>';
  session_destroy();
}
elseif($save==4) {
  echo '<h5 class="red>Error: Vote could not be Registered, Please retry!!</h5>';
}
}
public function login() {
$login = $this->user_model->login();

if($login==false) {
  echo 'false';
}
else{
  $res = get_object_vars($login);
$store =  $this->session->set_userdata($res);
  echo 'true';
}
}
public function logout() {
session_destroy();
  header('Location:'.base_url());
}
public function display_result() {
$i = 0;
  $get = $this->user_model->get_position();
  foreach ($get as $post) {
    $val = $post['position'];
    $req = $this->user_model->get_contestants($val);
    if(!empty($req)) {
$i++;
  echo'
           <div class="row text-center">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
               <h1 data-scroll-reveal="enter from the bottom after 0.1s"  class="header-line" style="text-transform:uppercase;">'.$post['position'].'</h1>
           </div>
       </div>
     <div class="row" >
             <div class="col-lg-12 cent text-center col-md-12 col-sm-12" data-scroll-reveal="enter from the bottom after 0.5s">
               <div class="col-md-11 about-contant">
            <div class="align-center">';
      foreach($req as $res) {
$cout = $res['id'];
$count = $this->user_model->get_result($cout);
        echo'<div class="col-md-3 col-sm-3 m-b15">
              <div class="content-bg">
                <div class="icon-bx-wraper bx-style-1 p-tb15 p-lr10 center">
                  <div class="box">
                    <div class="box-round">
              <img  id="img" src="'.base_url().'uploads/'.$res['passport'].'">
        </div></div>
                        <h5 style="text-transform: capitalize;" class="h5 text-primary">'.$res['name'].'
                        </h5>
                        <p style="text-transform: capitalize;">For '.$res['position'].'</p>
                        <hr/>
                        <h4 style="text-transform: capitalize;" class="red">Total Votes: '.$count.'
                        </h4>
                </div>
                </div>
            </div>
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
