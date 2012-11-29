<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include("../func/funciones.php");
$_SESSION[] = array();
session_destroy();
?>
<script language="JavaScript" type="text/javascript"> 
location.href = "on.php"; 
</script>
?>
