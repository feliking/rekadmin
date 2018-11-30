<?php
            require("../controller/conexion.php");
            $sql=("SELECT * FROM request");
            $query=mysqli_query($con,$sql);
            while($arreglo=mysqli_fetch_array($query)){
              $sql1=("SELECT * FROM proveedor where nombre='$arreglo[14]'");
              $query1=mysqli_query($con,$sql1);
              while($arreglo1=mysqli_fetch_array($query1)){
                $idp=$arreglo1[0];
                $nombre=$arreglo1[1];
                $nit=$arreglo1[2];
                $direccion=$arreglo1[3];
                $email=$arreglo1[4];
                $contacto=$arreglo1[5];
                $telefono=$arreglo1[6];
                $archivo=$arreglo1[7];
                $nro_cuenta=$arreglo1[8];
              }
              $confi=$arreglo[2];
              $nuevo=strtotime("+1 week",strtotime($confi));
              $nuevo=date("Y-m-d",$nuevo);
              $nuevo2=strtotime("+2 week",strtotime($confi));
              $nuevo2=date("Y-m-d",$nuevo2);
              $nuevo3=strtotime("+3 week",strtotime($confi));
              $nuevo3=date("Y-m-d",$nuevo3);
              $nuevo4=strtotime("+4 week",strtotime($confi));
              $nuevo4=date("Y-m-d",$nuevo4);
              if (date("Y-m-d")<$nuevo) {
                  $campo="unasemana";
                  if ($email!="" && $arreglo[17]!=1) {
                      $destinatarios=$email;
                                $titulo = "Notificacion de requerimiento";
                                $mail = "<font color='#FF9494'>Promujer IFD</font> informa que el requerimiento <b>$arreglo[4]</b> del proveedor <b>$arreglo[14]</b> cuenta con una semana aproximadamente desde su petición<br><br>Que tenga una excelente jornada";
                                $headers = "MIME-Version: 1.0\r\n";
                                $headers .= "Content-type: text/html; charset=UTF-8\r\n";  
                                $headers .= "From: ProMujer IFD < promujer@promujer.org >\r\n";
                                $bool = mail($destinatarios,$titulo,$mail,$headers);
                                if($bool){
                                    $sql4= "update request set noti1=1 where id_req=$arreglo[0]";
                                    $query4 = $con->query($sql4);
                                    if($query4!=null){
                                            echo "Se envio un correo electronico de notificacion al Proveedor: $arreglo[14]";
                                    }
                                    else{
                                            echo "Error interno del sistema, consulte con el administrador";
                                    }
                                }else{
                                    echo "No se pudo enviar correos, No se detecto conexion a internet";
                                }
                  }
              }
              else if (date("Y-m-d")<$nuevo2) {
                  $campo="dossemanas";
                  if ($email!="" && $arreglo[18]!=1) {
                      $destinatarios=$email;
                                $titulo = "Notificacion de requerimiento";
                                $mail = "<font color='#FF9494'>Promujer IFD</font> informa que el requerimiento <b>$arreglo[4]</b> del proveedor <b>$arreglo[14]</b> cuenta con dos semanas aproximadamente desde su petición<br><br>Que tenga una excelente jornada";
                                $headers = "MIME-Version: 1.0\r\n";
                                $headers .= "Content-type: text/html; charset=UTF-8\r\n";  
                                $headers .= "From: ProMujer IFD < promujer@promujer.org >\r\n";
                                $bool = mail($destinatarios,$titulo,$mail,$headers);
                                if($bool){
                                    $sql4= "update request set noti2=1 where id_req=$arreglo[0]";
                                    $query4 = $con->query($sql4);
                                    if($query4!=null){
                                            echo "Se envio un correo electronico de notificacion al Proveedor: $arreglo[14]";
                                    }
                                    else{
                                            echo "Error interno del sistema, consulte con el administrador";
                                    }
                                }else{
                                    echo "No se pudo enviar correos, No se detecto conexion a internet";
                                }
                  }
              }
              else if (date("Y-m-d")<$nuevo3) {
                  $campo="tressemanas";
                  if ($email!="" && $arreglo[19]!=1) {
                      $destinatarios=$email;
                                $titulo = "Notificacion de requerimiento";
                                $mail = "<font color='#FF9494'>Promujer IFD</font> informa que el requerimiento <b>$arreglo[4]</b> del proveedor <b>$arreglo[14]</b> cuenta con tres semanas aproximadamente desde su petición<br><br>Que tenga una excelente jornada";
                                $headers = "MIME-Version: 1.0\r\n";
                                $headers .= "Content-type: text/html; charset=UTF-8\r\n";  
                                $headers .= "From: ProMujer IFD < promujer@promujer.org >\r\n";
                                $bool = mail($destinatarios,$titulo,$mail,$headers);
                                if($bool){
                                    $sql4= "update request set noti3=1 where id_req=$arreglo[0]";
                                    $query4 = $con->query($sql4);
                                    if($query4!=null){
                                            echo "Se envio un correo electronico de notificacion al Proveedor: $arreglo[14]";
                                    }
                                    else{
                                            echo "Error interno del sistema, consulte con el administrador";
                                    }
                                }else{
                                    echo "No se pudo enviar correos, No se detecto conexion a internet";
                                }
                  }
              }
              else if (date("Y-m-d")<$nuevo4 || date("Y-m-d")>$nuevo4) {
                  $campo="cuatrosemanas";
                  if ($email!="" && $arreglo[20]!=1) {
                      $destinatarios=$email;
                                $titulo = "Notificacion de requerimiento";
                                $mail = "<font color='#FF9494'>Promujer IFD</font> informa que el requerimiento <b>$arreglo[4]</b> del proveedor <b>$arreglo[14]</b> cuenta con cuatro semanas aproximadamente desde su petición<br><br>Que tenga una excelente jornada";
                                $headers = "MIME-Version: 1.0\r\n";
                                $headers .= "Content-type: text/html; charset=UTF-8\r\n";  
                                $headers .= "From: ProMujer IFD < promujer@promujer.org >\r\n";
                                $bool = mail($destinatarios,$titulo,$mail,$headers);
                                if($bool){
                                    $sql4= "update request set noti4=1 where id_req=$arreglo[0]";
                                    $query4 = $con->query($sql4);
                                    if($query4!=null){
                                            echo "Se envio un correo electronico de notificacion al Proveedor: $arreglo[14]";
                                    }
                                    else{
                                            echo "Error interno del sistema, consulte con el administrador";
                                    }
                                }else{
                                    echo "No se pudo enviar correos, No se detecto conexion a internet";
                                }
                  }
              }
            }
            mysqli_close($con);
            ?>