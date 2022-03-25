<?php
    $link = mysqli_connect("127.0.0.1", "root", "", "heinsolar");
    
    if (!$link) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    if(isset($_POST['consulta'])){
        $c =$_POST['consulta'];

        switch ($c) {
            case 'no_c':
                
                if ($resultado = mysqli_query($link, "SELECT count(id) FROM cotizaciones")) {
                    $row = $resultado->fetch_array(MYSQLI_NUM);
                    printf($row[0]);
                    /* liberar el conjunto de resultados */
                    mysqli_free_result($resultado);
                }
                break;
            case 'datos_cot':
                

                $query = $link->prepare("INSERT INTO cotizaciones Values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $query->bind_param("ssssssssdddssss",$id,$no_cot,$nombre_c,$tel_c,$correo_c,$no_paneles,$inv,$pot,$total,$s_total,$iva,$fecha,$venci,$t1,$t2);
                $id="";
                $no_cot=  intval(mysqli_query($link, "SELECT count(id) FROM cotizaciones")->fetch_array(MYSQLI_NUM)[0])+1;
                $nombre_c=$_POST['nombre_cliente'];
                $tel_c=$_POST["tel_cliente"];
                $correo_c=$_POST["correo_cliente"];
                $no_paneles=$_POST["no_paneles"];
                $inv=$_POST["inversor"];
                $pot=$_POST["potencia"];
                $total=$_POST["total"];
                $s_total=$_POST["sub_total"];
                $iva=$_POST["iva"];
                $fecha=$_POST["fecha"];
                $venci=$_POST["vencimiento"];
                $t1=date("Y-m-d H:i:s");
                $t2="";

                $query->execute();
                
                printf("%d Fila insertada.\n", $query->affected_rows);
                /* cierra sentencia y conexión */
                $query->close();
                break;
            
                case "cot":
                    $array = array();
                    $mail=$_POST["mail"];
                    $cot =$_POST["no_cot"];
                    if ($resultado = mysqli_query($link, "SELECT * FROM cotizaciones WHERE (correo_cliente ='$mail' or no_cot ='$cot') and STR_TO_DATE(vencimiento,'%d/%m/%Y') > CURDATE() ")) {
                        if (mysqli_num_rows($resultado)!=0){
                            while ($row = $resultado->fetch_array (MYSQLI_ASSOC))
                            {
                              $array[]= $row ;
                            }
                           echo json_encode($array);
                         } else {
                           echo json_encode($array);
                         }
                    }
                    break;
                
                    case "cot_id":
                        $array = array();
                        $id=$_POST["id"];
                        if ($resultado = mysqli_query($link, "SELECT * FROM cotizaciones WHERE id='$id'")) {
                            if (mysqli_num_rows($resultado)!=0){
                                while ($row = $resultado->fetch_array (MYSQLI_ASSOC))
                                {
                                $array[]= $row ;
                                }
                            echo json_encode($array);
                            } else {
                            echo json_encode($array);
                            }
                        }
                        break;
                    
                        case "news":
                            $query = $link->prepare("INSERT INTO newsletter Values (?,?,?,?)");
                            $query->bind_param("ssss",$id,$email,$t1,$t2);
                            $id="";
                            $email=$_POST['mail'];
                            $t1=date("Y-m-d H:i:s");
                            $t2="";
                            $query->execute();
                            echo "ok";
                            $query->close();
                            break;
                
        }
    }


    mysqli_close($link);
    
?>