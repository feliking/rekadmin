<?php
	include "conexion.php";
	//$encriptado=$_POST['password'];
	$sql = "insert into usuario(
		ci,
		nombre,
		apellidos,
		sexo,
		email,
		nombre_usuario,
		password) values (
			\"$_POST[ci]\",
			\"$_POST[nombre]\",
			\"$_POST[apellido]\",
			\"$_POST[sexo]\",
			\"$_POST[email]\",
			\"$_POST[usuario]\",
			AES_ENCRYPT(\"$_POST[password]\",'rekadmin'))";
	$query = $con->query($sql);
	if($query!=null){
		print "<script>alert(\"Usuario Registrado: $_POST[nombre] tiene acceso al sistema\");window.location='../views/view_user.php';</script>";
	}
	else{
		echo "Algo anda al en la consulta";
	}
?>