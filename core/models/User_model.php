<?php
Class User_model Extends CI_model {

//Check and verify voters data
  public function login() {
//Select voters data from database
$this->db->select('*');
$this->db->where('reg_number',$this->input->post('reg_number'));
$query = $this->db->get('voters');
if($query->num_rows() > 0) {
/* If registration number exists,verify the access code */
$res = $query->row();
$passcheck = $this->input->post('code');

//if the voters pin is correct, retrieve the student data or return false
if($passcheck == $res->code) {
  return $query->row();
} else {
  return false;
} }
elseif($query->num_rows() < 1) {
//Return false if user doesnt exist
  return false;
}
}

    public function register() {
$data = $this->input->post();
$query = $this->db->insert('users',$data);
return $query->row();
    }

public function save_contestant($data) {
$query = $this->db->insert('contestants', $data);
if($query) {
  return true;
} else {
  return false;
}

}

public function update_contestant($data) {
  $this->db->where('id',$this->input->post('id'));
$query = $this->db->update('contestants', $data);
if($query) {
  return true;
} else {
  return false;
}

}
public function get_id() {
  $query = $this->db->get('contestants');
  return $query->num_rows();
}
public function get_biodata() {
//Requests student data from database, based on the logged in user
$this->db->select('*');
$this->db->where('id',$this->input->post('id'));
$query = $this->db->get('contestants');
return $query->row();
}
public function get_contestants($val) {
$this->db->select('*');
$this->db->where('position',$val);
$query =  $this->db->get('contestants');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}
public function get_positions() {
  $query = $this->db->get('position');
  return $query->result_array();
}
public function get_position() {
  $query = $this->db->get('position');
  return $query->result_array();
}
public function save_voter($data) {
  $query = $this->db->insert('voters', $data);
  if($query) {
    return true;
  } else {
    return false;
  }
}
public function verify_voter() {
    $this->db->select('reg_number');
  $this->db->where('reg_number',$this->input->post('reg_number'));
  $query = $this->db->get('voters');
  if($query->num_rows() > 0) {
  return true;
} else {
  return false;
}
}
public function save_code($reg,$code) {
  $data = array(
    'code' => $code,
  );
  $this->db->where('reg_number',$reg);
  $query = $this->db->update('voters',$data);
  if($query) {
    return true;
  } else {
    return false;
  }
}
public function startstop() {
  $query = $this->db->get('settings');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->row();
  }
}
public function save_settings() {
//$this->db->select('settings');
$data = $this->input->post();
$this->db->where('id','1');
$query = $this->db->update('settings',$data);
if($query) {
return TRUE;
} else{
return FALSE;
}
}
public function get_settings() {
  $query = $this->db->get('settings');
  return $query->row();
}
public function save_vote($val) {
$this->db->where('id',$val);
$get = $this->db->get('contestants');
$res = $get->row();
$data = array(
  'voter' => $this->session->reg_number,
  'vote_for_id' => $val,
  'vote_for' => $res->name,
  'position' => $res->position,
);
$this->db->where('voter',$this->session->reg_number);
$req = $this->db->get('votes');
$this->db->set($data);
  $query = $this->db->insert('votes');
  if($query) {
    return 3;}
   else {
    return 4;
}
}
public function check_vote() {
  $this->db->where('voter',$this->session->reg_number);
  $query = $this->db->get('votes');
  if($query->num_rows() < 1) {
    return false;
  } else {
    return true;
  }
}
public function get_result($cout) {
$this->db->select('*');
$this->db->where('vote_for_id',$cout);
$this->db->from('votes');
return $this->db->count_all_results();

}
}
