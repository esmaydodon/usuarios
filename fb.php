<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 2012 kuraka.net * esmaydodon
 */ 
?>
<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId'  => '130009957153651',
  'secret' => '607930811c2a5dcf1859dc642a45bc4e',
//    los datos otenidos de  nuestra aplicacion 
//    https://developers.facebook.com/apps/130009957153651/
  
));
/*
  $config = array();
  $config[‘appId’] = 'YOUR_APP_ID';
  $config[‘secret’] = 'YOUR_APP_SECRET';
  $config[‘fileUpload’] = false; // optional

  $facebook = new Facebook($config);
 */

// Get User ID
$user = $facebook->getUser();// de los datos anteriores optenemos datos del user

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    /*$uid = $facebook->getUser(); 
    $me = $facebook->api('/me');
     */
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
//logIn  o logout
// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array('next'=>'http://kuraka.net/desarrollo/usuarios/logout_fb.php'));
//  $logoutUrl = $facebook->getLogoutUrl(array('next'=>'http://localhost/fb/logout.php'));
} else {
  $loginUrl = $facebook->getLoginUrl(array('next'=>'http://kuraka.net/desarrollo/usuarios/login.php'));
}
//$me = $facebook->api('/me');
// $user_profile = $facebook->api('/me');
// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');
//
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
    
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>
<!--    Array(
    [fb_130009957153651_code] => AQDYxWTFiJT2iYCtBVBCm0UZoODUFRqOE5Q2PjE2gz-1rdXV7kWk9irJxNbcP6bRpQ2ET1QhskE0cBftBS50KhCNNSkaCKcNrq6qcbNJz_9ZY_YZNY6U69gq6CEHfoUo5bTJz52-aIEERHOqeiJbvtjCuHm-K2l0Dn6WkgeBxE11eMiQp_YwZSfHP3CXCi4wadhGclrJ7meYb6ScpSPBOWpG
    [fb_130009957153651_access_token] => AAAB2Pk1QO3MBABZCP7KHgLmnosm6WuOQFJFZBJ17tWHZAmOY5ghLwZCpDRDP9zqclPjk6JHbYjQkSAP0NDSAX7oZC2kko51AmtADm89dfNQZDZD
    [fb_130009957153651_user_id] => 1649043812
)
-->

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
<!--      Array
(
    [id] => 1649043812
    [name] => Marlon Martos Quiroz
    [first_name] => Marlon
    [last_name] => Martos Quiroz
    [link] => http://www.facebook.com/marlonmartos
    [username] => marlonmartos
    [gender] => male
    [timezone] => -5
    [locale] => es_ES
    [verified] => 1
    [updated_time] => 2012-11-19T15:21:43+0000
)-->
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>

    <h3>Public profile of Naitik</h3>
    <!--<img src="https://graph.facebook.com/naitik/picture">-->
    <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
    <?php //$naitik = $facebook->api('/naitik');
    //echo $naitik['name']; gracias (y)
    echo $user_profile['name'];
    ?>
  </body>
</html>