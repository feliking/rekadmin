<?php 
  include "../controller/conexion.php";
  $found=false;
  $sql1= "SELECT * FROM usuario";
  $query = $con->query($sql1);
  while ($r=$query->fetch_array()) {
    $found=true;
    break;
  }
  if ($found) {
   print "<script>alert(\"Acceso restringido, Ya existe un usuario en el sistema\");window.location='../index.php';</script>";
  }
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Rekadmin</title>
   <link rel="shortcut icon" href="../assets/favicono.ico">
  <link rel="stylesheet" href="../css/welcome.css">
</head>
<body>
<div class="overlay">
  <form name="crea_usuario" class="form-wrapper" method="post" action="../controller/add_user.php">
  <div class="wrap" style="float: left; padding-left: 10%">
   <h1>Bienvenido a Rekadmin</h1>
   <h3>Configura tú cuenta por favor para proteger tu información</h3>
   <input type="number" name="ci" id="ci" placeholder="Carnet de identidad" required>
    <input type="text" name="nombre" id="nombre" placeholder="Nombres" required>
    <input type="text" name="apellido" id="apellido" placeholder="Apellidos" required>
    <select name="sexo" id="sexo">
      <option value="" disabled selected>Genero</option>
      <option value="M">Masculino</option>
      <option value="F">Femenino</option>
    </select>
    <input type="email" name="email" id="email" placeholder="Correo Electronico" required>
  </div>
  <div class="wrap" style="float: right; padding-right: 10%">
    <h3 style="padding-top: 50%">Autentificacion</h3>
    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
    <input type="password" name="password" id="password" placeholder="Contraseña" required>
    <input type="password" name="password2" id="password2" placeholder="Repita su contraseña" required>
    <div class="error" id="error"></div>
    <input type="submit" value="Configuracion completa">
  </div>
  </form>
</div>
  
  
<script type="text/javascript">
      with(document.crea_usuario){
        onsubmit = function(e){
        e.preventDefault();
        if(password.value!=password2.value){
          document.getElementById("error").innerHTML="Las contraseñas no coinciden";
        }
        else{ 
          submit(); 
        }
  }
}
    </script>
</body>

</html>
