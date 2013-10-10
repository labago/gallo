<?php
require_once('resources/api/facebook/facebook.php');
require_once('resources/creds.php');
session_start();

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => $facebook_app_id,
  'secret' => $facebook_app_secret,
  'cookie' => true,
));

// Get User ID
$fb_user = $facebook->getUser();

if ($fb_user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_info = fetch_user_info_token($fb_user);
    $token = @$user_info[9];
    $crypt = @$user_info[4];

    $user_profile = $facebook->api('/me', array('access_token' => $token));
  } catch (FacebookApiException $e) {
    error_log($e);
    $fb_user = false;
  }
}

if($fb_user)
{
  setcookie("user", $crypt, time()+2592000);
}
else
{
  $fb_user = false;
}


$logout_params = array( 'next' => $facebook_logout);
$login_params = array(
  'scope' => 'email, user_photos',
  'redirect_uri' => $facebook_login
  );
$loginUrl = $facebook->getLoginUrl($login_params);
$logoutUrl = $facebook->getLogoutUrl($logout_params);
?>