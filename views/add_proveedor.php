<?php
session_start();
if(!isset($_SESSION["user_id"])){
    print "<script>alert(\"Acceso Restringido, Debe identificarse\");window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Nuevo proveedor</title>
  <link rel="shortcut icon" href="../assets/favicono.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/cabecera.css"> <!-- Resource style -->
    <script src="../js/modernizr.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<nav class="cd-stretchy-nav">
        <a class="cd-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>
          <li><a href="../views/principal.php"><span><font color="#5484FF">Volver a Requisitos</font></span></a></li>
            <li><a href="../views/add_request.php" class="active"><span><font color="#5484FF">Nuevo requerimiento</font></span></a></li>
            <li><a href="../views/view_proveedor.php" class="active"><span><font color="#5484FF">Ver proveedores</font></span></a></li>
            <li><a href="../views/update_user.php"><span><font color="#5484FF">Cambiar contraseña</font></span></a></li>
            <li><a href="../controller/logout.php"><span><font color="#5484FF">Salir: <?php echo $_SESSION["nombre"]  ?></font></span></a></li>
        </ul>
        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
<div class="container">
  <form  action="../controller/add_proveedor.php" method="post" name="form" enctype="multipart/form-data">
  <div class="frame3">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Nuevo Proveedor</a></li>
      </ul>
    </div>
				  <div class="form-signin">
          <label for="fullname">Nombre de la empresa</label>
          <input class="form-styling" type="text" name="nombre" placeholder="Ej. Prolimpio, Sony, Daewo"/>
          <label for="email">NIT</label>
          <input class="form-styling" type="text" name="nit" placeholder=" Ej. 12837128936123"/>
          <label for="password">Dirección</label>
          <input class="form-styling" type="text" name="direccion" placeholder="Ej. Av. 6 de Agosto, Nro. 1040"/>
          <label for="confirmpassword">Correo electronico</label>
          <input class="form-styling" type="email" name="email" placeholder="Ej. juan.perez@promujer.org"/>
          <label for="confirmpassword">Personas de contacto</label>
          <input class="form-styling" type="text" name="contacto" placeholder="Ej. Vania - José - Fernando" />
          <label for="confirmpassword">Telefonos de contacto</label>
          <input class="form-styling" type="text" name="telefono" placeholder="Ej. 2-2394567 - 72543988"/>
          <label for="confirmpassword">¿Desea subir algún archivo de respaldo?</label>
          <input type="file" name="respaldo" accept="image/*,application/pdf">
          <br>
          <br>
          <label for="confirmpassword">Número de cuenta</label>
          <input class="form-styling" type="number" name="nro_cuenta" placeholder="Ej. 2239432749324"/>
          <input  class="btn-signup" type="submit" name="submit" value="Registrar Proveedor">
          <input type="hidden" name="ide" "<?php echo $_SESSION['user_id']; ?>">
          </div>
          </center>
          </div>
  </form>
</div>
  <script src='../js/jquery.min.js'></script>
<script src='../js/angular.min.js'></script>
<script src="../js/cabecera.js"></script> 
</body>
</html>