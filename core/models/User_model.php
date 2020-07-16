<?php
Class User_model Extends CI_model {


  public function login() {
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
if($query) {
  return true;
} else {
  return false;
}
    }

public function update_user($data) {
  $this->db->where('id',$this->input->post('id'));
$query = $this->db->update('users', $data);
if($query) {
  return true;
} else {
  return false;
}

}
public function get_id() {
  $query = $this->db->get('users');
  return $query->num_rows();
}

public function get_biodata() {
//Requests student data from database, based on the logged in user
$this->db->select('*');
$this->db->where('id',$this->input->post('id'));
$query = $this->db->get('users');
return $query->row();
}
public function get_submissions_approved() {
$this->db->where('status','approved');
$query =  $this->db->get('submissions');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_submissions_pending() {
$this->db->where('status','pending');
$query =  $this->db->get('submissions');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_articles() {
$query =  $this->db->get('articles');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}
public function get_volume() {
  $query = $this->db->get('volume');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_issue() {
  $query = $this->db->get('issue');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_editor() {
  $this->db->where('position','editor');
  $query = $this->db->get('users');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_payments() {
  $this->db->where('status','paid');
  $query = $this->db->get('payments');
  if($query->num_rows() < 0) {
    return false;
  } else {
      return $query->result_array();
  }
}

public function get_issues() {
  $this->db->where('volume',$this->input->post('volume'));
  $query = $this->db->get('issue');
  return $query->result_array();
}

public function save_issue() {
  $query = $this->db->insert('issue', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function update_issue() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('issue', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function save_volume() {
  $query = $this->db->insert('volume', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function update_volume() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('volume', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function publish_article() {
  $query = $this->db->insert('articles', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
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
public function delete_item() {
  $type = $this->input->post('type');

  if($type=="volume") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('volume');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}   elseif($type=="issue") {
    $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('issue');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}   elseif($type=="articles") {
  $query = $this->db->delete('articles');
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
public function count_articles() {
$this->db->select('*');
$this->db->where('issue',$this->input->post('issue'));
$this->db->from('articles');
return $this->db->count_all_results();

}

public function update_article() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('articles', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
}
