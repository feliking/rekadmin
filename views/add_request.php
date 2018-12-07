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
  <title>Nuevo requerimiento</title>
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
            <li><a href="../views/add_request.php" class="active"><span>Nuevo requerimiento</span></a></li>
            <li><a href="../views/add_proveedor.php" class="active"><span>Registrar proveedor</span></a></li>
            <li><a href="../views/principal.php"><span>Volver a Requerimientos</span></a></li>
            <li><a href="../views/add_proveedor.php"><span>Registrar Proveedores</span></a></li>
            <li><a href="../controller/logout.php"><span>Salir: <?php echo $_SESSION["nombre"]  ?></span></a></li>
        </ul>
        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
<div class="container">
  <?php 
    $count=1;
    $ano=date('Y');
    require("../controller/conexion.php");
    $sql=("SELECT * FROM request");
    $query=mysqli_query($con,$sql);
    while($arreglo=mysqli_fetch_array($query)){
      $count++;
    }
   ?>
  <form id="request" action="../controller/add_request.php" method="post" name="form" enctype="multipart/form-data">
  <div class="frame">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Nuevo requerimiento</a></li>
      </ul>
    </div>
				  <div class="form-signin">
          <label for="fullname">Nro de Requerimiento</label>
          <input class="form-styling" type="text" name="nro_req" placeholder="Ej. 001/2018" value="<?php echo "$count/$ano";?>" />
          <label for="confirmpassword">Proveedor</label>
          <select class="form-styling" style="width: 70%; float: left;" name="proveedor" id="proveedor">
            <option value="No definido" selected>Sin definir aún</option>
            <?php 
              require ("../controller/conexion.php");
              $sql="SELECT * FROM proveedor";
              $query=mysqli_query($con,$sql);
              while($arreglo=mysqli_fetch_array($query)){
                echo "<option value='$arreglo[1]' selected>$arreglo[1]</option>";
              }
            ?>
          </select>
          <a class='button form-styling' style="width: 30%; float: right;" href='#openModal'>Nuevo</a>
          <br>
                      
          <label for="email" style="width: 100%;">Fecha entrega requerimiento a Administracion</label>
          <input class="form-styling" type="date" name="fecha_entrega" id="fecha_entrega" placeholder="" required />
          <label for="email">Area Of. solicitante</label>
          <select class="form-styling" name="area_of" id="area_of" required>
            <option value="" disabled selected>Elija una opcion</option>
            <option value="Area de TI">Area de TI</option>
            <option value="Recursos Humanos">Recursos Humanos</option>
            <option value="Administración">Administración</option>
            <option value="Auditoria">Auditoria</option>
            <option value="Servicios Financieros">Servicios Financieros</option>
            <option value="Educación">Educación</option>
            <option value="Riesgos">Riesgos</option>
            <option value="Legal">Legal</option>
            <option value="Finanzas">Finanzas</option>
            <option value="Contabilidad">Contabilidad</option>
            <option value="Operaciones">Operaciones</option>
            <option value="Proyectos">Proyectos</option>
            <option value="Gerencia General">Gerencia General</option>
            <option value="otros">Otros</option>
          </select>
          <input class="form-styling" type="hidden" name="area" id="area" placeholder="Escriba el area solicitante" />
          <label for="confirmpassword">Detalle</label>
          <input class="form-styling" type="text" name="detalle" placeholder=""/>
          <label for="confirmpassword">Incluye terminos de referencia</label>
          <input class="form-styling" type="text" name="ref" placeholder="" value="N/A" />
          <label for="confirmpassword">El requerimiento cuenta con presupuesto</label>
          <select class="form-styling" name="presu" id="presu" required>
            <option value="" disabled selected>Elija una opcion</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
          <label for="confirmpassword">Costo (Si no lo tiene escriba un cero)</label>
          <input class="form-styling" type="number" name="costo" id="costo" step="0.01" placeholder="Ej. 200.30"/>
          <label for="confirmpassword">Responsable</label>
          <input class="form-styling" type="text" name="resp" placeholder="Ej. Gina Escobar"/>
          
          
          </div>
          </center>
          </div>
          <div class="frame2">
            <center>
          <div class="form-signin">
            <label for="confirmpassword">Estado</label>
          <select class="form-styling" name="estado" id="estado" required>
            <option value="" disabled selected>Elija una opcion</option>
            <option value="CERRADO">CERRADO</option>
            <option value="CANCELADO">CANCELADO</option>
            <option value="EN PROCESO">EN PROCESO</option>
            <option value="COTIZACION">COTIZACION</option>
            <option value="APROBADO">APROBADO</option>
          </select>
            <label for="confirmpassword">Cuadro comparativo</label>
          <input type="file" name="respaldo" accept="image/*, application/pdf" />
          <label for="confirmpassword">Fecha de entrega</label>
          <input class="form-styling" type="date" name="fecha_entregado" placeholder=""/>
          <label for="confirmpassword">Enviado a las regionales o entregado en fecha</label>
          <input class="form-styling" type="text" name="enviado" id="envio" value="N/A" onfocus="(this.value='', this.type='date')"/>
          <label for="confirmpassword">Confirmacion de entrega / Recepcion</label>
          <label for="fullnam">
            El Alto<input type="checkbox" id="1" name="confir[]" value="1"/>
            La Paz<input type="checkbox" id="2" name="confir[]" value="2"/>
            Cochabamba<input type="checkbox" id="3" name="confir[]" value="3"/>
          </label>
          <label for="fullname">
            Santa Cruz<input type="checkbox" id="4" name="confir[]" value="4"/>
            Oruro<input type="checkbox" id="5" name="confir[]" value="5"/>
            Tarija<input type="checkbox" id="6" name="confir[]" value="6"/>
          </label>
          <label for="fullname">
            Potosi<input type="checkbox" id="7" name="confir[]" value="7"/>
            Pando<input type="checkbox" id="8" name="confir[]" value="8"/>
            Beni<input type="checkbox" id="9" name="confir[]" value="9"/>
            Sucre<input type="checkbox" id="10" name="confir[]" value="10"/>
          </label>
          <label for="fullname"></label>
          <br>
          
          <label for="confirmpassword">Fecha de aprobación de Diseño</label>
          <input class="form-styling" type="text" name="diseno" placeholder="Ej. N/A"/>
          <label for="confirmpassword">Observaciones</label>
          <input class="form-styling" type="text" name="obs" placeholder="Ej. Comprado y entregado a RRHH"/>
          <label for="confirmpassword">Modalidad de contrato</label>
          <input class="form-styling" type="text" name="modalidad" placeholder="Ej. Directo"/>
          <label for="confirmpassword">¿Cuenta con contrato?</label>
          <select class="form-styling" name="cuentacon" id="cuentacon" required>
            <option value="" disabled selected>Elija una opcion</option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
          <label for="confirmpassword">Estado de contrato</label>
          <input class="form-styling" type="text" name="estadocon"/>
          <input class="btn-signup" type="submit" name="submit" id="submit" value="Registrar Requerimiento">
          <input type="hidden" name="ide" value="<?php echo $_SESSION['user_id']; ?>">
          </div>
          </center>
        </div>
  </form>
                      <div id='openModal' class='modalbg'>
                        <div class='dialog' style="background: #098300;">
                          <form id="proveedor" action="../controller/add_proveedor.php" method="post" name="form" enctype="multipart/form-data">
                              <font color='#354DFF' style='font-weight:bold'>
                                <input class="form-styling" type="text" name="nombre" placeholder="Nombre del proveedor"/></h2>
                                <input class="form-styling" type="text" name="nit" placeholder="NIT"/>
                                <input class="form-styling" type="text" name="direccion" placeholder="Dirección"/>
                                <input class="form-styling" type="email" name="email" placeholder="Correo Electronico"/>
                                <input class="form-styling" type="text" name="contacto" placeholder="Contacto" />
                                <input class="form-styling" type="text" name="telefono" placeholder="Telefono"/>
                                <input class="form-styling" type="file" name="respaldo" accept="image/*,application/pdf">
                                <input class="form-styling" type="number" name="nro_cuenta" placeholder="Número de cuenta"/>
                                <input class="btn-signup button" style="background:#354DFF; " type="submit" name="submit2" id="submit2" value="Registrar Proveedor">
                                <input type="hidden" name="ide" "<?php echo $_SESSION['user_id']; ?>">
                              </font>
                          </form>
                          <a href='#close' title='Close' class='close'>X</a>
                          </div>
                      </div>
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