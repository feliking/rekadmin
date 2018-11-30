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
  <title>Proveedores</title>
  <link rel="shortcut icon" href="../assets/favicono.ico">
    <link rel='stylesheet prefetch' href='../plugins/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='../plugins/css/jquery.dataTables.min.css'>
    <link rel='stylesheet prefetch' href='../plugins/css/buttons.dataTables.min.css'>
    <link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../css/cabecera.css"> <!-- Resource style -->
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <script src="../js/modernizr.js"></script> <!-- Modernizr -->
    <style type="text/css">
        body{
              background: url(../assets/index.jpg) fixed;
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
            <li><a href="../views/principal.php"><span><font color="blue">Ver Requerimientos</font></span></a></li>
            <li><a href="../views/add_proveedor.php"><span><font color="blue">¿Tienes dudas de como hacer un nuevo registro?</font></span></a></li>
            <li><a href="../views/update_user.php"><span><font color="blue">Cambiar contraseña</font></span></a></li>
            <li><a href="../controller/logout.php"><span><font color="blue">Salir: <?php echo $_SESSION["nombre"]  ?></font></span></a></li>
        </ul>

        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
    <h1 class="titulo"><center>Proveedores registrados</center></h1>

  <table id="example" class="display table table-bordered table-hover nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Nombre del Proveedor</th>
                <th>NIT</th>
                <th>Dirección</th>
                <th>Correo Electronico</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Archivo de respaldo</th>
                <th>Número de cuenta</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nro</th>
                <th>Nombre del Proveedor</th>
                <th>NIT</th>
                <th>Dirección</th>
                <th>Correo Electronico</th>
                <th>Contacto</th>
                <th>Telefono</th>
                <th>Archivo de respaldo</th>
                <th>Número de cuenta</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $count=0;
            $campo=null;
            $suma=0;
            require("../controller/conexion.php");
            $sql=("SELECT * FROM proveedor");
            $query=mysqli_query($con,$sql);
            while($arreglo=mysqli_fetch_array($query)){
              $count++;
              echo "<tr id='$campo'>";
              echo "<td>$count</td>";
              echo "<td>$arreglo[1]</td>";
              echo "<td>$arreglo[2]</td>";
              echo "<td>$arreglo[3]</td>";
              echo "<td>$arreglo[4]</td>";
              echo "<td>$arreglo[5]</td>";
              echo "<td>$arreglo[6]</td>";
              if ($arreglo[7]!=null) {
                echo "<td><a href='../files/proveedor/$arreglo[7]' target='_blank'>Ver documento adjuntado</td>";
              }
              else{
                echo "<td>No se subió ningún documento</td>";
              }
              echo "<td>$arreglo[8]</td>";
              echo "<td><a class='button' href='../views/update_proveedor.php?id=$arreglo[0]'>Modificar</a> <a class='button' href='../controller/delete_proveedor.php?id=$arreglo[0]' style='background:#FF3B3B'>Eliminar</a></td>";
              echo "</tr>";
            }
            mysqli_close($con);
            ?>
        </tbody>
    </table>
    <script src='../plugins/js/jquery-2.2.4.min.js'></script>
    <script src='../plugins/js/jquery.dataTables.min.js'></script>
    <script src='../plugins/js/dataTables.buttons.min.js'></script>
    <script src='../plugins/js/buttons.flash.min.js'></script>
    <script src='../plugins/js/jszip.min.js'></script>
    <script src='../plugins/js/pdfmake.min.js'></script>
    <script src='../plugins/js/vfs_fonts.js'></script>
    <script src='../plugins/js/buttons.html5.min.js'></script>
    <script src='../plugins/js/buttons.print.min.js'></script>
    <script src="../js/cabecera.js"></script> 

    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "info":     false,
        language: {
        "decimal": ".",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    //Añadir Scroll
        //"scrollY":        "50vh",//define el tamaño o dinamismo de la tabla
        //"scrollCollapse": true,
        //"paging":         false,
    dom: 'Bfrtip',
        buttons: [
            'excel',
    ]
    } );
} );
    </script>
</body>
</html>
