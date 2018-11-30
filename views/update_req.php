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
  <title>Actualizar requerimiento</title>
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
            <li><a href="../views/add_request.php" class="active"><span>Nuevo requerimiento</span></a></li>
            <li><a href="../views/principal.php"><span>Volver a Requerimientos</span></a></li>
            <li><a href="../views/add_proveedor.php"><span>Registrar Proveedores</span></a></li>
            <li><a href="../views/update_user.php"><span>Cambiar contraseña</span></a></li>
            <li><a href="../controller/logout.php"><span>Salir: <?php echo $_SESSION["nombre"]  ?></span></a></li>
        </ul>
        <span aria-hidden="true" class="stretchy-nav-bg"></span>
    </nav>
<div class="container">
  <form  action="../controller/update_req.php" method="post" name="form" enctype="multipart/form-data">
    <?php 
          extract($_GET);
          require("../controller/conexion.php");
          $sql="SELECT * FROM request WHERE id_req=$id";
          $ressql=mysqli_query($con,$sql);
          while ($row=mysqli_fetch_row($ressql)) {
            $nro_req=$row[1];
            $fecha_entrega=$row[2];
            $area_of=$row[3];
            $detalle=$row[4];
            $ref=$row[5];
            $presu=$row[6];
            $costo=$row[7];
            $resp=$row[8];
            $estado=$row[9];
            $cuadro=$row[10];
            $fecha_entregado=$row[11];
            $enviado=$row[12];
            $cadena_de_texto=$row[13];
            $proveedor=$row[14];
            $diseno=$row[15];
            $obs=$row[16];
            $modalidad=$row[17];
            $cuentacon=$row[18];
            $estadocon=$row[19];
          }
          mysqli_close($con);
     ?>
  <div class="frame">
    <center>
    <div class="navi">
      <ul class"links">
        <li class="signin-active"><a class="btn" href="#">Actualizar requerimiento</a></li>
      </ul>
    </div>
				  <div class="form-signin">
          <label for="fullname">Nro de Requerimiento</label>
          <input class="form-styling" type="text" name="nro_req" placeholder="Ej. 001/2018" value="<?php echo $nro_req; ?>" />
          <label for="email">Fecha entrega requerimiento a Administracion</label>
          <input class="form-styling" type="date" name="fecha_entrega" id="fecha_entrega" placeholder="" value="<?php echo $fecha_entrega; ?>" required />
          <label for="password">Área, Oficina, solicitante</label>
          <input class="form-styling" type="text" name="area_of" placeholder="" value="<?php echo $area_of; ?>"/>
          <label for="confirmpassword">Detalle</label>
          <input class="form-styling" type="text" name="detalle" placeholder="" value="<?php echo $detalle; ?>"/>
          <label for="confirmpassword">Incluye terminos de referencia</label>
          <input class="form-styling" type="text" name="ref" placeholder="" value="N/A" value="<?php echo $ref; ?>"/>
          <label for="confirmpassword">El requerimiento cuenta con presupuesto</label>
          <select class="form-styling" name="presu" id="presu" required>
            <option value="<?php echo $presu; ?>" selected><?php echo $presu; ?></option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
          <label for="confirmpassword">Costo (Si no lo tiene escriba un cero)</label>
          <input class="form-styling" type="number" name="costo" id="costo" step="0.01" placeholder="Ej. 200.30" value="<?php echo $costo; ?>"/>
          <label for="confirmpassword">Responsable</label>
          <input class="form-styling" type="text" name="resp" placeholder="Ej. Gina Escobar" value="<?php echo $resp; ?>"/>
          <label for="confirmpassword">Estado</label>
          <select class="form-styling" name="estado" id="estado" required>
            <option value="<?php echo $estado; ?>" selected><?php echo $estado; ?></option>
            <option value="CERRADO">CERRADO</option>
            <option value="CANCELADO">CANCELADO</option>
            <option value="EN PROCESO">EN PROCESO</option>
            <option value="COTIZACION">COTIZACION</option>
            <option value="APROBADO">APROBADO</option>
          </select>
          <label for="confirmpassword">Cuadro comparativo</label>
          <input type="file" name="respaldo" accept="image/*, application/pdf" />
          </div>
          </center>
          </div>
          <div class="frame2">
            <center>
          <div class="form-signin">
          <label for="confirmpassword">Fecha de entrega</label>
          <input class="form-styling" type="date" name="fecha_entregado" placeholder="" value="<?php echo $fecha_entregado; ?>"/>
          <label for="confirmpassword">Enviado a las regionales o entregado en fecha</label>
          <input class="form-styling" type="text" name="enviado" id="envio" onfocus="(this.value='', this.type='date')" value="<?php echo $enviado; ?>"/>
          <label for="confirmpassword">Confirmacion de entrega / Recepcion</label>
          <label for="fullnam">
            <?php  
            if ((strpos($cadena_de_texto,"1"))!==false) {
                          echo "<input type='checkbox' id='1' name='confir[]' value='1' checked/> El Alto";
                        }
                        else{
                          echo "<input type='checkbox' id='1' name='confir[]' value='1'/> El Alto";
                        }
                        if ((strpos($cadena_de_texto,"2"))!==false) {
                          echo "<input type='checkbox' id='2' name='confir[]' value='2' checked/> La Paz";
                        }
                        else{
                          echo "<input type='checkbox' id='2' name='confir[]' value='2'/> La Paz<br>";
                        }
                        if ((strpos($cadena_de_texto,"3"))!==false) {
                          echo "<input type='checkbox' id='3' name='confir[]' value='3' checked/> Cochabamba";
                        }
                        else{
                          echo "<input type='checkbox' id='3' name='confir[]' value='3'/> Cochabamba";
                        }
                        ?>
                      </label>
            <label for="fullnam">
              <?php  
                        if ((strpos($cadena_de_texto,"4"))!==false) {
                          echo "<input type='checkbox' id='4' name='confir[]' value='4' checked/> Santa Cruz";
                        }
                        else{
                          echo "<input type='checkbox' id='4' name='confir[]' value='4'/> Santa Cruz";
                        }
                        if ((strpos($cadena_de_texto,"5"))!==false) {
                          echo "<input type='checkbox' id='5' name='confir[]' value='5' checked/> Oruro";
                        }
                        else{
                          echo "<input type='checkbox' id='5' name='confir[]' value='5'/> Oruro";
                        }
                        if ((strpos($cadena_de_texto,"6"))!==false) {
                          echo "<input type='checkbox' id='6' name='confir[]' value='6' checked/> Tarija";
                        }
                        else{
                          echo "<input type='checkbox' id='6' name='confir[]' value='6'/> Tarija";
                        }
                        ?>
                      </label>
            <label for="fullnam">  
              <?php 
                        if ((strpos($cadena_de_texto,"7"))!==false) {
                          echo "<input type='checkbox' id='7' name='confir[]' value='7' checked/> Potosi";
                        }
                        else{
                          echo "<input type='checkbox' id='7' name='confir[]' value='7'/> Potosi";
                        }
                        if ((strpos($cadena_de_texto,"8"))!==false) {
                          echo "<input type='checkbox' id='8' name='confir[]' value='8' checked/> Pando";
                        }
                        else{
                          echo "<input type='checkbox' id='8' name='confir[]' value='8'/> Pando<br>";
                        }
                        if ((strpos($cadena_de_texto,"9"))!==false) {
                          echo "<input type='checkbox' id='9' name='confir[]' value='9' checked/> Beni";
                        }
                        else{
                          echo "<input type='checkbox' id='9' name='confir[]' value='9'/> Beni";
                        }
                        if ((strpos($cadena_de_texto,"10"))!==false) {
                          echo "<input type='checkbox' id='10' name='confir[]' value='10' checked/> Sucre";
                        }
                        else{
                          echo "<input type='checkbox' id='10' name='confir[]' value='10'/> Sucre";
                        }
                        ?>
          </label>
          <label for="fullname"></label>
          <br><label for="confirmpassword">Proveedor</label>
          <select class="form-styling" name="proveedor" id="proveedor">
            <option value="<?php echo $proveedor; ?>" selected><?php echo $proveedor; ?></option>
            <?php 
              require ("../controller/conexion.php");
              $sql="SELECT * FROM proveedor";
              $query=mysqli_query($con,$sql);
              while($arreglo=mysqli_fetch_array($query)){
                echo "<option value='$arreglo[1]'>$arreglo[1]</option>";
              }
            ?>
          </select>
          <label for="confirmpassword">Fecha de aprobación de Diseño</label>
          <input class="form-styling" type="text" name="diseno" placeholder="Ej. N/A" value="<?php echo $diseno; ?>"/>
          <label for="confirmpassword">Observaciones</label>
          <input class="form-styling" type="text" name="obs" placeholder="Ej. Comprado y entregado a RRHH" value="<?php echo $obs; ?>"/>
          <label for="confirmpassword">Modalidad de contrato</label>
          <input class="form-styling" type="text" name="modalidad" placeholder="Ej. Directo" value="<?php echo $modalidad; ?>"/>
          <label for="confirmpassword">¿Cuenta con contrato?</label>
          <select class="form-styling" name="cuentacon" id="cuentacon" required>
            <option value="<?php echo $cuentacon; ?>" selected><?php echo $cuentacon; ?></option>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
          </select>
          <label for="confirmpassword">Estado de contrato</label>
          <input class="form-styling" type="text" name="estadocon" value="<?php echo $estadocon; ?>" />
          <input  class="btn-signup" type="submit" value="Actualizar Requerimiento">
          <input type="hidden" name="ide" id="ide" value="<?php echo $id; ?>">
          <input type="hidden" name="docu1" id="docu1" value="<?php echo $cuadro; ?>">
          </div>
          </center>
        </div>
  </form>
</div>
  <script type="text/javascript" src='../js/jquery.min.js'></script>
<script type="text/javascript" src='../js/angular.min.js'></script>
<script type="text/javascript" src="../js/cabecera.js"></script> 
</body>
</html>