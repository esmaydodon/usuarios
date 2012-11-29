<?php
session_start();
/*
 * kuraka.net 2012 / esmaydodon
 * and open the template in the editor.
 */
?>
<?php 

// modificacion de codigo Xombra (www.xombra.com) 21/03/2009 para sectorweb.net
include("func/funciones.php");
$login = quitar(trim($_POST['login']));
$pass = sha1(md5(trim($_POST['pass']))); // encriptamos en MD5 para despues comprar (Modificado)
 // $query="SELECT * FROM usuarios WHERE login='$login'"; Antes
 
 $query = "SELECT * FROM usuarios WHERE nick_usuario='$login' and pass_usuario='$pass'";
 $result=dime($query);
 // if(mysql_num_rows($result)==0){ // antes
if(mysql_num_rows($result)){ // nos devuelve 1 si encontro el usuario y el password
 $array=mysql_fetch_array($result);
 //  if($array["password"]==crypt($pass,"semilla") ){ // Antes
 /* Comprobamos que el password encriptado en la BD coincide con el password que nos han dado al encriptarlo. Recuerda usar semilla para encriptar los dos passwords. */
 $_SESSION["nick_usuario"]=$array["nick_usuario"];
 $_SESSION["nombre_usuario"]=$array["nombre_usuario"];
  $_SESSION["email_usuario"]=$array["email_usuario"]; // Agrgado Nuevo
 header("Location:user.php");
 }  else {
 echo ("Login o Password Incorrectos");  // Ahora
 }
 ?>