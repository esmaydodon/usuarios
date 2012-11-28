<?php
/*
 * CREATE DATABASE wall;
 * CREATE TABLE message (id int AUTO_INCREMENT , message tinytext, date timestamp, PRIMARY KEY(id));
 * 
 * http://www.cristalab.com/tutoriales/muro-parecido-a-facebook-en-php-mysql-y-jquery-c100234l/
 */

//Conecto al servidor
include("func/funciones.php");

//Realizo la consulta de la tabla y ordeno por fecha (El ultimo mensaje de primero)
$query = mysql_query("SELECT * FROM mensages ORDER BY idmensage DESC");

//Muestro los mensaje en una lista desordenada
echo '<ul id="message">';
//Si la consulta es verdadera
if($query == true){
   //Recorro todos los campos de la tabla y los muestro
   while ($row = mysql_fetch_array($query)){
      echo "<li><p>".$row['bd_mensage']." <span id=\"date\">".$row['idmensage']."</span></li>";
   }
}
echo '</ul>'
?>