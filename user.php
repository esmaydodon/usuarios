<? session_start();
if(!isset($_SESSION)){
header("location:login.php");
} else {
echo "";
echo "
<h1>Hacer</h1>
";
echo "Bienvenido al Area de usurios: <strong>";
echo $_SESSION["nick_usuario"]." ".$_SESSION["nombre_usuario"]." ".$_SESSION["email_usuario"]." ";
echo "</strong>
Has entrado con el nick: <strong> ";
echo $_SESSION["login"];
echo "</strong>Para cerrar la sesión, pulsa: <a href='logout.php'>Aqui</a>";
echo "";
}
?>