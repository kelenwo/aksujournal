<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setupfile {

  function send($number, $message)
  {
    $ci = & get_instance();
    $data=array("username"=>'kelenwo68@gmail.com',"hash"=>'0/goNLjY0zs-y1jrPe0q0hQY765mdTq2hAA10HJrWo','apikey'=>false);
    $sender  = "ACES ELECTIONS";
    $numbers = array($number);
    $ci->load->library('textlocal',$data);

    $response = $ci->textlocal->sendSms($numbers, $message, $sender);
  return $response;
  }
}
