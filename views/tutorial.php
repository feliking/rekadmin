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
  <title>Requerimientos de Administracion</title>
  <link rel="shortcut icon" href="../assets/favicono.ico">
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/cabecera.css"> <!-- Resource style -->
    <script src="../js/modernizr.js"></script> <!-- Modernizr -->
    <style type="text/css">
        body{
              background: url(../assets/tutorial.jpg) fixed;
			  -webkit-background-size:cover;
			  -moz-background-size:cover;
			  -o-background-size:cover;
			  background-size:cover;
			  padding-top: 3%;
        }

        input{
            border: none;
            content: " adsfasdf";
            background: #eee;
            border: 1px solid #ccc;
            border-radius: 15px;
        }
        tr th{
        	background-color: #5974FF;
        	color: #fff;
            text-align: center;
        }
        .valores{
            text-align: right;
        }
        @font-face{
            font-family: fuentenueva;
            src: url(../fonts/quantifypremium/webdesignpro.ttf);
        }
        .titulo{
            font-size: 40px;
            font-family: fuentenueva;
            color: #fff;
        }
        #unasemana{
            background-color: #6FFF5C;
        }
        #dossemanas{
            background-color: #FFF95E;
        }
        #tressemanas{
            background-color: #FF9E50;
        }
        #cuatrosemanas{
        	background-color: #FF9494;
        }
        li:hover{
          background-color: #fff;
        }
    </style>
</head>
<body>
	<nav class="cd-stretchy-nav">
        <a class="cd-nav-trigger" href="#0">
            
            <span aria-hidden="true"></span>
        </a>
        <ul>
            <li><a href="../views/add_proveedor.php"><span><font color="blue">Registrar Proveedores</font></span></a></li>
            <li><a href="../views/add_request.php" class="active"><span><font color="blue">Registrar Requerimiento</font></span></a></li>
            <li><a href="../views/view_proveedor.php"><span><font color="blue">Ver Proveedores registrados</font></span></a></li>
            <li><a href="../views/update_user.php"><span><font color="blue">Cambiar contraseña</font></span></a></li>
            <li><a href="../controller/logout.php"><span><font color="blue">Salir: <?php echo $_SESSION["nombre"]  ?></font></span></a></li>
        </ul>

        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
    <script src='../plugins/js/jquery-2.2.4.min.js'></script>
    <script src="../js/cabecera.js"></script> 
</body>
</html>