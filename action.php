<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * http://www.cristalab.com/tutoriales/muro-parecido-a-facebook-en-php-mysql-y-jquery-c100234l/
 */
?>
<?php
//Defino mi variable mensaje
$msg = $_POST['msg'];

//Si no esta vacia
if(!empty($msg)){
include("func/funciones.php");
   //Inserto el mensaje al tabla
   mysql_query("INSERT INTO mensages (bd_mensage) VALUES ('".$msg."')");
}
?>