<?php

$to = "jlane09sjp@gmail.com";
$name = $_POST["name"];
$subject = "Contact Form Message - New School Sports - From: ".$name;
$email = $_POST['email'];
$message = $_POST['comments'];

$headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
// Additional headers
$headers .= 'From: Contact Us <'.$email.'>'."\r\n";

if(mail($to, $subject, $message, $headers))
	echo "Sent!";

?>