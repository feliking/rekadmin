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
  <title>Actualizar proveedor</title>
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
          <li><a href="../views/view_proveedor.php"><span><font color="#5484FF">Volver a Proveedores</font></span></a></li>
          <li><a href="../views/principal.php"><span><font color="#5484FF">Ver requerimientos</font></span></a></li>
            <li><a href="../views/add_request.php" class="active"><span><font color="#5484FF">Nuevo requerimiento</font></span></a></li>
            
            <li><a href="../views/update_user.php"><span><font color="#5484FF">Cambiar contraseña</font></span></a></li>
            <li><a href="../controller/logout.php"><span><font color="#5484FF">Salir: <?php echo $_SESSION["nombre"]  ?></font></span></a></li>
        </ul>
        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
<div class="container">
  <form  action="../controller/update_proveedor.php" method="post" name="form" enctype="multipart/form-data">
    <?php 
          extract($_GET);
          require("../controller/conexion.php");
          $sql="SELECT * FROM proveedor WHERE id_pro=$id";
          $ressql=mysqli_query($con,$sql);
          while ($row=mysqli_fetch_row($ressql)) {
            $nombre=$row[1];
            $nit=$row[2];
            $direccion=$row[3];
            $email=$row[4];
            $contacto=$row[5];
            $telefono=$row[6];
            $archivo=$row[7];
            $nro_cuenta=$row[8];
          }
          mysqli_close($con);
     ?>
  <div class="frame3">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Actualizar Proveedor</a></li>
      </ul>
    </div>
				  <div class="form-signin">
          <label for="fullname">Nombre de la empresa</label>
          <input class="form-styling" type="text" name="nombre" placeholder="Ej. Prolimpio, Sony, Daewo" value="<?php echo $nombre; ?>" />
          <label for="email">NIT</label>
          <input class="form-styling" type="text" name="nit" placeholder="12837128936123" value="<?php echo $nit; ?>"/>
          <label for="password">Dirección</label>
          <input class="form-styling" type="text" name="direccion" placeholder="Av. 6 de Agosto, Nro. 1040" value="<?php echo $direccion; ?>"/>
          <label for="confirmpassword">Correo electronico</label>
          <input class="form-styling" type="email" name="email" placeholder="juan.perez@promujer.org" value="<?php echo $email; ?>"/>
          <label for="confirmpassword">Personas de contacto</label>
          <input class="form-styling" type="text" name="contacto" placeholder="Ej. Vania - José - Fernando" value="<?php echo $contacto; ?>"/>
          <label for="confirmpassword">Telefonos de contacto</label>
          <input class="form-styling" type="text" name="telefono" placeholder="2-2394567 - 72543988" value="<?php echo $telefono; ?>"/>
          <label for="confirmpassword">¿Desea subir algún archivo de respaldo?</label>
          <input type="file" name="respaldo" accept="image/*,application/pdf">
          <br>
          <br>
          <label for="confirmpassword">Número de cuenta</label>
          <input class="form-styling" type="number" name="nro_cuenta" placeholder="Ej. 2239432749324"/>
          <input  class="btn-signup" type="submit" name="submit" value="Actualizar Proveedor">
          <input type="hidden" name="ide" id="ide" value="<?php echo $id; ?>">
          <input type="hidden" name="docu1" id="docu1" value="<?php echo $archivo; ?>">
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