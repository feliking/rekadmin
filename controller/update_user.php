<?php

if(!empty($_POST)){
	if(isset($_POST["ci"]) &&isset($_POST["pass1"]) &&isset($_POST["pass2"])){
		if($_POST["ci"]!=""&&$_POST["pass1"]!=""&&$_POST["pass2"]!=""){
			if ($_POST["pass4"]!=$_POST["pass1"]) {
				print "<script>alert(\"La contraseña actual es incorrecta, por favor verifique.\");window.location='../views/update_user.php';</script>";
			}
			else if ($_POST["pass2"]!=$_POST["pass3"]) {
				print "<script>alert(\"Repitio mal la contraseña. vuelva a introducirla por favor.\");window.location='../views/update_user.php';</script>";
			}
			else{
			include "conexion.php";
			$encry=$_POST['pass2'];
			$sql2= "UPDATE usuario SET nombre_usuario=\"$_POST[nombre_usuario]\", password=AES_ENCRYPT('$encry','rekadmin') where ci=\"$_POST[ci]\"";
			$query = $con->query($sql2) or die(mysqli_error($con));
			mysqli_close($con);
			if($query!=null){
				session_start();
				session_destroy();
				print "<script>alert(\"Datos actualizados correctamente\");window.location='../index.php';</script>";
			}
			else{
				print "<script>alert(\"Error interno del sistema, consulte con el administrador\");window.location='../views/page_admin.php';</script>";
			}
			}
			}
		}
	}


?>