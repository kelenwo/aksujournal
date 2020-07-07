<?php

function sendsms($phone, $msg) {
  // Account details
      	$apiKey = urlencode('0/goNLjY0zs-y1jrPe0q0hQY765mdTq2hAA10HJrWo');

      	// Message details
      		$sender = urlencode('ACES ELECTION');
      	// Prepare data for POST request
      	$data = array('apikey' => $apiKey, 'numbers' => $phone, "sender" => $sender, "message" => $msg);

      	// Send the POST request with cURL
      	$ch = curl_init('https://api.txtlocal.com/send/');
      	curl_setopt($ch, CURLOPT_POST, true);
      	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      	$response = curl_exec($ch);
      	curl_close($ch);

      	// Process your response here
      	echo $response;

}
