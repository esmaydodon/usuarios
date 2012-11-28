<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
// modificacion de codigo Xombra (www.xombra.com) 21/03/2009 para sectorweb.net
 
include("func/funciones.php"); /*Traemos el archivo config*/
/*Recibimos las variables por el metodo POST*/
$login = htmlspecialchars(trim($_POST['login']));
$pass1 = trim($_POST['pass1']);
$pass2 = trim($_POST['pass2']);
$nombre= htmlspecialchars(trim($_POST['nombre']));
//$apaterno= htmlspecialchars(trim($_POST['apaterno']));
//$amaterno= htmlspecialchars(trim($_POST['amaterno']));
$email = htmlspecialchars(trim($_POST['email']));
/*Hacemos la consulta */
// $query="SELECT * FROM usuarios WHERE login='$login'"; //ANTES
$link=mysql_connect($server,$dbuser,$dbpass);
$result = dime("SELECT * FROM usuarios WHERE nick_usuario='".mysql_real_escape_string($login)."'");
if(mysql_num_rows($result)){
echo "El usuario ya existe en la BD";
} else {
mysql_free_result($result);
/* Ahora comprovamos que los dos pass coinciden */
if($pass1!=$pass2) {
echo "Los passwords deben coincidir";
echo 'Click <a href="index.php">aquí</a> para volver al formulario';
} else {
/* Encriptamos "Ciframos" el password
// $pass1=crypt($pass2, "semilla"); // ANTES */
$pass1=sha1(md5($pass1)); // Ahora
//tipos_usuarios_idtipos_usuarios = 4 invitado
/* $query="INSERT INTO usuarios (login, nombre, apaterno, amaterno, password, email) VALUES ('$login','$nombre','$apaterno', '$amaterno','$pass1','$email')"; */  // Antes
$query  =  sprintf("INSERT INTO usuarios (nick_usuario,nombre_usuario,pass_usuario, email_usuario,tipos_usuarios_idtipos_usuarios)  VALUES ('$login','$nombre','$pass1', '$email',4)"); 
$result=dime($query);
if($result){
echo "Usuario introducido correctamente";
} else {
echo "Error introduciendo el usuario";
} /* Cierre del else */
} /* Cierre del else que corresponde a if(mysql_affected_rows.....) */
} /* Cierre del else que corresponde a if(mysql_num_rows...) */
?>