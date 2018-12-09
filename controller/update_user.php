<?php
	include "conexion.php";
	//$encriptado=$_POST['password'];
	if($_POST["password"]){
		$sql = "UPDATE usuario SET
			nombre = '$_POST[nombre]',
			apellidos = '$_POST[apellido]',
			sexo = '$_POST[sexo]',
			email = '$_POST[email]',
			nombre_usuario = '$_POST[usuario]',
			password = AES_ENCRYPT('$_POST[password]', 'rekadmin')
			WHERE ci = $_POST[id]";
	}
	else{
		$sql = "UPDATE usuario SET
			nombre = '$_POST[nombre]',
			apellidos = '$_POST[apellido]',
			sexo = '$_POST[sexo]',
			email = '$_POST[email]',
			nombre_usuario = '$_POST[usuario]'
			WHERE ci = $_POST[id]";
	}
	$query = $con->query($sql) or die("Error al ejecutar una consulta en la base de datos, Consulte con el administrador");
	if($query!=null){
		print "<script>alert(\"Usuario Actualizado exitosamente\");window.location='../views/view_user.php';</script>";
	}
	else{
		echo "Algo anda al en la consulta";
	}
?>