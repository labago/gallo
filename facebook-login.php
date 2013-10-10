<?php
include('functions.php'); 

$user_info = fetch_user_info_token($fb_user);

if(isset($user_info[7]))
	$token = $user_info[7];
else
	$token = "";

if(!(strlen($token) > 0))
	$token = $facebook->getAccessToken();

try{
	@$user_profile = $facebook->api('/me', array('access_token' => $token));
}
catch (FacebookApiException $e) {
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}

@$fname = $user_profile['first_name'];
@$lname = $user_profile['last_name'];
@$email = $user_profile['email'];
@$id = $facebook->getUser();
@$access_token = $facebook->getAccessToken();
@$password = "changeme";
@$pic = "http://graph.facebook.com/".$id."/picture?type=large";

$db->db_connect();

$query = "SELECT * 
FROM  `Users` 
WHERE  `Email` LIKE  '$email'
LIMIT 0 , 30";

$result = $db->db_query($query);

$no_account = true;

if($db->db_num_rows($result) > 0)
{
	$no_account = false;	
	$row = $db->db_fetch_row($result);
	$crypt = $row[4];
}

if($no_account)
{
	$crypt = add_user($fname, $lname, $password, $email, $pic, $id, $access_token);

	$header = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
	$header .= 'From: New School Sports <do-not-reply@newschoolsports.com>'."\r\n"; 

	$message = "Dear ".$fname.", <br><br>";
	$message .= "Welcome to New School Sports!";

	mail($email, "Welcome!", $message, $header);
}
else
	update_user_facebook_info($fname, $lname, $email, $pic, $id, $crypt, $access_token);


setcookie("user", $crypt, time()+2592000);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
?>