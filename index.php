<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * http://www.cristalab.com/tutoriales/muro-parecido-a-facebook-en-php-mysql-y-jquery-c100234l/
 */
?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
<!--
 * Creado el 25/08/2011
 *
 * Autor: Daniel Mora
 * Email: danmoracr@gmail.com
 * 
-->
 <head>
  <title>Muro Tipo Facebook</title>
  
  <!-- Se incluye el framework de JavaScript "JQuery" -->
  <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
  function loadWall(){
     //Funcion para cargar el muro
     $("#wall").load('wall.php');
     //Devuelve el campo message a vacio
     $("#msg").val("")
  }
  
  //Cuando el documento esta listo carga el muro
 $(document).ready(function(){
   loadWall();
    $("#boton_registrar").click(function(evento)
      {	   $("#logear").css("display", "block");
            $("#on").css("display", "none");
        });
    $("#boton_cerrar").click(function(evento)
      { $("#logear").css("display", "none");  
        $("#on").css("display", "none");
    });
      
    $("#boton_on").click(function(evento)
      {	   $("#on").css("display", "block"); 
            $("#logear").css("display", "none"); 
        });
    $("#boton_cerrar_on").click(function(evento)
      { $("#on").css("display", "none"); 
        $("#logear").css("display", "none"); 
    });
 });
  </script>
  
  <!-- Le doy un poco de estilo-->
  <style type="text/css">
     body{
        font-family: "lucida grande",tahoma,verdana,arial,sans-serif;
     }
     label{
        color: #808080;
        font-size: 11px;
        font-weight: bold;
        line-height: 30px;
     }
     #wrapper{
        width: 605px;
        margin-left: auto;
        margin-right: auto;
     }
     #msg{
        border: thin solid #B4BBCD !important;
        padding: 5px;
     }
     #submit{
        color: #fff;
        font-size: 13px;
        background-color: #5B74A8;
        background-image: url("background.png");
        background-position: 0 -98px;
        background-repeat: no-repeat;
        border-color: #29447E #29447E #1A356E;
       border-style: solid;
       border-width: 1px;
       cursor: pointer;
       display: inline-block;
       font-weight: bold;
       line-height: normal !important;
       padding: 4px 6px 4px;
       text-align: center;
       text-decoration: none;
       vertical-align: top;
       white-space: nowrap;
     }
     #wall{
        width: 430px;
        min-height: 200px;
        border: solid thin #B4BBCD;
        margin-top: 10px;
     }
     #wall ul{
        list-style: none;
        font-size: 12px;
        line-height: 20px;
     }
     #wall ul #date{
        font-style: italic;
        font-size: 11px;
        color: #ccc;
        padding-left: 5px;
     }
     #loading{
        float: left;
        position:relative;
        top: 10px;
        left: 450px;
        display: none;
     }

  </style>
    <link href="css/adminPanel2.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
 <div id="wrapper">
     <span class="button medio azul" id="boton_registrar">Registrar</span>
     <span class="button medio azul" id="boton_on">Sing In</span>
     <!--formulario registro-->
 <div id="logear" class="notiDetalle2" >  
<form action="crea_usuarios.php" method="post" class="contacto"> 
    nick-<input name="login" type="text"/><br>  
        Password-<input name="pass1" type="password" /> <br>
            Repite Password-<input name="pass2" type="password"  /><br>
                Nombre-<input name="nombre" type="text"  /><br>
                    E-mail-<input name="email" type="text"  /> <br><input name="Crear" type="submit" /> 
</form>
     
     <span class="button medio naranja " id="boton_cerrar">Cerrar</span>
</div>
       <!--formulario registro end--> 
     <!--formulario ingreso-->
     <div id="on" class="notiDetalle2">      
<form class="contacto" action="comprueba.php" method="post"> 
Login:<input name="login" type="text" />
Password:<input name="pass" type="password" /> <input class="boton" type="submit" value="Entrar" /> 
</form>
     <span class="button medio naranja " id="boton_cerrar_on">Cerrar</span>    
     </div>  
     <!--formulario ingreso end--> 
    <div id="form">
       <form action="javascript: addMessage();" method="post" id="form_wall">
          <label for="msg">Type text below...</label>
          <br />
          <input type="text" name="msg" id="msg" maxlength="200" size="50" />
          <input type="submit" name="submit" id="submit" value="Share" />
       </form>
    <div id="loading"><img src="loading.gif" /></div>
    </div>
    
    <div id="wall"></div>

    <div id="ingresa" class="opcionesIndex"><a href="on.php">Ingresa</a> 
    
    </div>
 </div>
 
<script>
   function addMessage(){
      
      //Tomas el valor del campo msg      
      var msg = $("#msg").val();
      
      //Si empieza el ajax muestro el loading
      $("#loading").ajaxStart(function(){
         $("#loading").show();
      });
      
      //Cuando termina el ajax oculta el loading
      $("#loading").ajaxStop(function(){
         $("#loading").hide();
      });
      
      //Se envian los datos a url y al completarse se recarga el muro
      //con la nueva informacion
      $.ajax({
         url: 'action.php',
         data: 'msg='+ msg,
         type: 'post',
         error: function(obj, msg, obj2){
            alert(msg);
         },
         success: function(data){
            loadWall();
         }
      });      
   };
</script>
 </body>
</html>