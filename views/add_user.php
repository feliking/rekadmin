<?php
session_start();
if(isset($_SESSION["user_id"])){
    if($_SESSION["user_id"]!=0){
        print "<script>alert(\"No esta autorizado para ver esta página, consulte con el administrador\");window.location='../index.php';</script>";
    }
}
else{
  print "<script>alert(\"Acceso denegado, debe identificarse\");window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>REKADMIN</title>
  <link rel="shortcut icon" href="../assets/favicono.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/cabecera.css"> <!-- Resource style -->
    <script src="../js/modernizr.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
</head>

<body>
  <nav class="cd-stretchy-nav">
    <a class="cd-nav-trigger" href="#0">
      
      <span aria-hidden="true"></span>
    </a>

    <ul>
      <li><a href="../views/view_user.php" class="active"><span>Ver usuarios con acceso al sistema</span></a></li>
      <li><a href="../controller/logout.php"><span>Salir: <?php echo $_SESSION["nombre"]  ?></span></a></li>
    </ul>
    <span aria-hidden="true" class="stretchy-nav-bg"></span>
  </nav>
  <div class="container">
  <form  action="../controller/add_user.php" method="post" name="form" enctype="multipart/form-data">
  <div class="frame3">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Nuevo Usuario</a></li>
      </ul>
    </div>
				  <div class="form-signin">
          <label for="fullname">Carnet de identidad</label>
          <input class="form-styling" type="number" name="ci" id="ci" placeholder="Carnet de identidad" title="Carnet de identidad" required>
          <label for="fullname">Nombres</label>
          <input class="form-styling" type="text" name="nombre" id="nombres" placeholder="Nombres" title="Nombres">
          <label for="fullname">Apellidos</label>
          <input class="form-styling" type="text" name="apellido" id="apellidos" placeholder="Apellidos" title="Apellidos">
          <label for="fullname">Género</label>
          <select class="form-styling" name="sexo" id="sexo" title="Genero" required>
            <option value="" selected disabled>Elija el género</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
          </select>
          <label for="fullname">Correo Electrónico</label>
          <input class="form-styling" type="email" name="email" id="email" placeholder="Correo electronico" title="Correo Electronico">
          <label for="fullname">Nombre de usuario</label>
          <input class="form-styling" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" title="Nombre de usuario">
          <label for="fullname">Contraseña</label>
          <input class="form-styling" type="password" name="password" id="pass2" placeholder="Introduzca contraseña" required title="Contraseña">
          <input class="btn-signup" type="submit" value="Añadir usuario">
          <div class="row cf" style="color: red"><p id="error"></p></div>
          </div>
          </center>
          </div>
  </form>
</div>
  <script type="text/javascript" src='../js/jquery.min.js'></script>
<script type="text/javascript" src='../js/angular.min.js'></script>
<script type="text/javascript" src="../js/cabecera.js"></script> 
<script type="text/javascript">
  window.onload=function(){
    var eSelect = document.getElementById('area_of');
     var optarea_of = document.getElementById('area');
     eSelect.onchange = function(){
      if (eSelect.selectedIndex===14) {
        optarea_of.type = 'text';
        optarea_of.name = 'area_of';
      }
     }
  }
</script>
    
</body>
</html>
