<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 2012 kuraka.net * esmaydodon
 */
?>
<?php
    require 'src/facebook.php';
    $facebook = new Facebook(array(
      'appId'  => '130009957153651',
      'secret' => '607930811c2a5dcf1859dc642a45bc4e',
      'cookie' => true,
   ));

   $session = $facebook->getSession();

   //redirects to index
   //lo configuro en la aplicacion 
  // header('Location:http://kuraka.net/desarrollo/usuarios/fb.php');
?>

