<?php

$url = 'https://api.sendgrid.com/';
$user = 'breffni_0StRf0GGgZ';
$pass = '3nHFB5AtfK';



$message = "Name :- ".$_POST["name"]."<br/><br/>";
$message = $message."Phone Number :- ".$_POST["phone"]."<br/><br/>";
$message = $message."Message :- ".$_POST["message"]."<br/><br/>";


$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => "Breffnisolutions@gmail.com",
    'subject'   => "Contact From Website :: " .$_POST["name"],
    'html'      => $message,
    'from'      => $_POST["email"],
  );

  


$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

//// print everything out
//print_r($response);


header('Location: ContactusSuccess.html'); 


?>