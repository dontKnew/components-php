<?php

//initialize facebook sdk
require 'fb/vendor/autoload.php';
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '',
  'app_secret' => '',
  'default_graph_version' => 'v2.5',

]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional

try {
  if (isset($_SESSION['facebook_access_token'])) {
    $accessToken = $_SESSION['facebook_access_token'];
  } else {

    $accessToken = $helper->getAccessToken();
  }
} catch (Facebook\Exceptions\facebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// if (isset($accessToken)) {
//   if (isset($_SESSION['facebook_access_token'])) {
//       $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
//   } else {
//     $_SESSION['facebook_access_token'] = (string) $accessToken;
//     $oAuth2Client = $fb->getOAuth2Client();
//     $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
//     $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
//     $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
//   }
//   // redirect the user to the profile page if it has "code" GET variable
//   if (isset($_GET['code'])) {
//       header('Location: profile.php');
//   }
//   // if already logged redirect to profile page
//   if(isset($_SESSION['fb_id'])){
//     header('Location: profile.php');
//   }else {
//     try {
//       $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
//       $requestPicture = $fb->get('/me/picture?redirect=false&height=200'); //getting user picture
//       $picture = $requestPicture->getGraphUser();
//       $profile = $profile_request->getGraphUser();
      
//       $fbid = $profile->getProperty('id');           // To Get Facebook ID
//       $fbfullname = $profile->getProperty('name');   // To Get Facebook full name
//       $fbemail = $profile->getProperty('email');    //  To Get Facebook email
//       $fbpic = "<img src='" . $picture['url'] . "' class='img-rounded'/>";
  
//       # save the user nformation in session variable
//       $_SESSION['fb_id'] = $fbid . '</br>';
//       $_SESSION['fb_name'] = $fbfullname . '</br>';
//       $_SESSION['fb_email'] = $fbemail . '</br>';
//       $_SESSION['fb_pic'] = $fbpic . '</br>';
//       $_SESSION['profile'] = $picture;
//       $_SESSION['ok'] = $profile;
  
//     } catch (Facebook\Exceptions\FacebookResponseException $e) {
//       echo 'Graph returned an error: ' . $e->getMessage();
//       session_destroy();
//       // redirecting user back to app login page
//       header("Location: ./config.php");
//       exit;
  
//     } catch (Facebook\Exceptions\FacebookSDKException $e) {
//       echo 'Facebook SDK returned an error: ' . $e->getMessage();
//       exit;
//     }
//   }
  
// } else {
//   // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used            
//   $loginUrl = $helper->getLoginUrl('http://localhost/PHP/fb%20login/config.php', $permissions);
//   echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
// }

?>