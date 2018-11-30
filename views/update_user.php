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
  <title>Actualizar contraseña</title>
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
  <form  id="update_user" action="../controller/update_user.php" method="post" name="form" enctype="multipart/form-data">
    <?php 
          extract($_GET);
          require("../controller/conexion.php");
          $ci=$_SESSION['user_id'];
          $sql="SELECT * FROM usuario WHERE ci=$ci";
          $ressql=mysqli_query($con,$sql);
          $password=$_SESSION['password'];
          while ($row=mysqli_fetch_row($ressql)) {
            $ci=$row[0];
            $nombre=$row[1];
            $apellidos=$row[2];
            $sexo=$row[3];
            $email=$row[4];
            $nombre_usuario=$row[5];
          }
          mysqli_close($con);
     ?>
  <div class="frame3">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Actualizar Contraseña</a></li>
      </ul>
    </div>
          <div class="form-signin">
          <label for="fullname">Esta registrado/a a nombre de :</label>
          <input class="form-styling" type="text" name="nombres" placeholder="Ej. Prolimpio, Sony, Daewo" value="<?php echo $nombre.' '.$apellidos; ?>" readonly/>
          <label for="email">Introduzca nuevo nombre de usuario</label>
          <input class="form-styling" type="text" name="nombre_usuario" placeholder="12837128936123" value="<?php echo $nombre_usuario; ?>"/>
          <label for="password">Introduzca su contraseña actual</label>
          <input class="form-styling" type="password" name="pass1" id="pass1" placeholder="Contraseña actual" />
          <label for="confirmpassword">Introduca nueva contraseña</label>
          <input class="form-styling" type="password" name="pass2" id="pass2" placeholder="Nueva Contraseña" />
          <label for="confirmpassword">Repita la nueva contraseña</label>
          <input class="form-styling" type="password" name="pass3" id="pass3" placeholder="Repita contraseña" />
          <div id="msg" style="font:#FF0000; width: 100%;"></div>
          <input  class="btn-signup" type="submit" name="submit" value="Actualizar Contraseña">
          <input type="hidden" name="pass4" value="<?php echo $_SESSION['password']; ?>">
          <input type="hidden" name="ci" value="<?php echo $_SESSION['user_id']; ?>">
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