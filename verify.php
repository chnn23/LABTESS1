<?php 
  $access_token = 's/0BKnNaoqFoLPOG3Zf9QUKg1Dgek7MIjbCx5/z+mmvPczY79Prf1miNvIoAtTXJpk8Y5EuQsFsJfRQUTDxiKeF5+JOC4QhDqt3UDcaqM0eNEOicRzrAbBWj8YZUsVMdu2D7eoIyp6UmLXWIOFs7iQdB04t89/1O/w1cDnyilFU=';
  $url = 'https://api.line.me/oauth2/v2.1/verify';
  $headers = array('Authorization: Bearer ' . $access_token);
  $ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);curl_close($ch);
  echo $result;
