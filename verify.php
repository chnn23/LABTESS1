<?php 
  $access_token = 'FiR2b24dOoWPcM58It3MrA2cbdnhNLfWFqoPYp2NC4+InNLvoCNIVCjfl3G6M9VdVCohI6Dkfwh9zT6d93ZUris+Wx+tsL2+Cmwdmnf594+7am6ybF8P4IfdyrNJie0X6h+dJ+TcDoCy0Mx3klMQ8gdB04t89/1O/w1cDnyilFU=';
  $url = 'https://api.line.me/oauth2/v2.1/verify';
  $headers = array('Authorization: Bearer ' . $access_token);
  $ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);curl_close($ch);
  echo $result;
