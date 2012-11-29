<? session_start();
if(isset($SESSION)){
header("location:user.php"); /* Si ha iniciado la sesion, vamos a user.php */
} else {
/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */
?></p>
<h1>Identificación</h1>
<form class="miform" action="comprueba.php" method="post"> 
Login:<input name="login" type="text" />
Password:<input name="pass" type="password" /> <input class="boton" type="submit" value="Entrar" /> </form><? } /* Y cerramos el else */?>
<a href="index.php">index</a>
