<?php 
  include "controller/conexion.php";
  $found=false;
  $sql1= "SELECT * FROM usuario WHERE ci = 0";
  $query = $con->query($sql1);
  while ($r=$query->fetch_array()) {
    $found=true;
    break;
  }
  if (!$found) {
   	print "<script>alert(\"No existe un administrador en el sistema, por favor configurelo\");window.location='views/welcome.php';</script>";
	}
  else{
  	session_start();
	if(isset($_SESSION["user_id"])){
	    if($_SESSION["user_id"]!=null){
	      	print "<script>alert(\"Hay una sesion activa\");window.location='views/principal.php';</script>";
	      }
	    }
  }
  mysqli_close($con);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>REKADMIN</title>
  <link rel="shortcut icon" href="assets/favicono.ico">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1 style="font-family: rekfont;">REKADMIN</h1>
		<form name="login" class="form" method="post" action="controller/login.php">
			<input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de usuario">
			<input type="password" name="password" id="password" placeholder="Contraseña">
			<button type="submit" name="login" id="login-button">Ingresar</button>
			<div id="msg" style="font-family: rekfont; font-size: 20px"></div>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='js/jquery-3.1.1.min.js'></script>


    <script type="text/javascript">
      with(document.login){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && nombre_usuario.value==""){
			ok=false;
			document.getElementById("msg").innerHTML="Escriba el usuario por favor";
			nombre_usuario.focus();
		}
		if(ok && password.value==""){
			ok=false;
			document.getElementById("msg").innerHTML="Escriba su contraseña por favor";
			password.focus();
		}
		if(ok){ 
			 submit();
 }
	}
}

    </script>

</body>
</html>
