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
public function get_submissions() {
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

public function get_issue_link($links0,$links1,$links2) {
$this->db->where('archive',$links0);
$this->db->where('volume',$links1);
$this->db->where('issue',$links2);
$query =  $this->db->get('articles');
if($query->num_rows() < 0) {
  return mysqli_error();
} else {
    return $query->result_array();
}
}

public function get_article_link($links0,$links1,$links2) {
$this->db->where('archive',$links0);
$this->db->where('volume',$links1);
$this->db->where('issue',$links2);
$query =  $this->db->get('articles');
if($query->num_rows() < 0) {
  return mysqli_error();
} else {
    return $query->row();
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

public function get_news() {
$query =  $this->db->get('news');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function get_archive() {
$query =  $this->db->get('archive');
if($query->num_rows() < 0) {
  return false;
} else {
    return $query->result_array();
}
}

public function update_news() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('news', $this->input->post());
  if($query) {
    return true;
  } else {
    return false;
  }
}

public function get_issues() {
  $this->db->where('volume',$this->input->post('volume'));
  $query = $this->db->get('issue');
  return $query->result_array();
}

public function get_volumes() {
  $this->db->where('archive',$this->input->post('archive'));
  $query = $this->db->get('volume');
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

public function update_archive() {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->update('archive', $this->input->post());
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

public function save_archive() {
  $query = $this->db->insert('archive', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
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

public function submit() {
  $query = $this->db->insert('submissions', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}

public function publish_news() {
  $query = $this->db->insert('news', $this->input->post());
  if($query) {
    return true;
  } else {
    return mysqli_error();
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
}   elseif($type=="article") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('articles');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}  elseif($type=="news") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('news');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}  elseif($type=="users") {
  $this->db->where('id',$this->input->post('id'));
  $query = $this->db->delete('users');
  if($query) {
    return true;
  } else {
    return mysqli_error();
  }
}
  elseif($type=="archive") {
    $this->db->where('id',$this->input->post('id'));
    $query = $this->db->delete('archive');
    if($query) {
      return true;
    } else {
      return mysqli_error();
    }
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
