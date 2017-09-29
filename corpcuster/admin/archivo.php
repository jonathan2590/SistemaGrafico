<?php
 
//conexiones, conexiones everywhere
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();

header('Content-type: application/json; charset=utf-8');
include("class/configuracion/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();          


$fecha="";
$numerofilas=1;
$numregistro=1;
$table_cabecera='cabecera_sensores';
$table_detalle = 'log_sensores';
$table_temp = 'log_sensores';
$columna = array();
$sensor = array();
$idcarga=(date("YmdHis"));
 
$values="";
$sqldetalle="";
$sqlcabecera="";

$Hora = strtotime(date('H:i:s')) + (60 *60 * -7); 
$fechasistema=date('Y-m-d H:i:s',$Hora) ;

set_time_limit(0);

    /*if(isset($_POST['submit']))
    {*/
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['file']['name'];
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['file']['tmp_name'];
             $handle = fopen($filename, "r"); 

              $sql = "ALTER TABLE ".$table_detalle." DISABLE KEYS; ";
                
                if ($db->query($sql) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Alterar lo Indices".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;
                
                }
            
 


            //while (!feof($handle) )
             while (($data = fgetcsv($handle, 1024, ",")) !== FALSE)
             {
             //$data = fgetcsv($handle, 1024);
           
            if ($numerofilas==2)
            {
                $columna=$data;
           
                            $columna = str_replace(" ", "", $data);
                            $columna = str_replace("(", "", $columna);
                            $columna = str_replace(")", "", $columna);
                            $columna = str_replace("-", "_", $columna);

                         //echo json_encode($columna);
                      
                         $rowcount=0;
                         while ($rowcount<count($columna))
                         {
                            $columna[$rowcount]="d_".strtolower($columna[$rowcount]);

                            $arrcolumna[] = array('columna' => $columna[$rowcount] );
                            $rowcount=$rowcount+1;
                          
                         }

                            
             $sqlcabecera = "insert into ".$table_temp." (d_id_carga,".implode(",",$columna).") values";
            }

            if ($numerofilas==3)
            {
             $sensor=$data;

             $rowcount=0;
             $arrsensor = array();
                   while ($rowcount<count($sensor)) {
                    $arrsensor[] = array('columna' => $columna[$rowcount],
                    $columna[$rowcount] => utf8_encode($sensor[$rowcount]));
                    $rowcount=$rowcount+1;
                  
                    } 
             $sensor=$arrsensor;    


            }

             $medidas=$data;
            if ($numerofilas==4)
            {

                    $rowcount=0;
                   
                    $medidas = str_replace("µ", "u", $data);
                        

                    $arr = array();
                    while ($rowcount<count($medidas)) {
                    $arr[] = array('columna' => $columna[$rowcount],
                        $columna[$rowcount] => html_entity_decode(htmlentities($medidas[$rowcount])));
                    $rowcount=$rowcount+1;
                  
                    } 
                    $medidas=$arr;       


          
                 

                //mysql_query($sql) or die('Error: '.mysql_error());
              }


                if ($numerofilas>4)
                {
                $datetime = new DateTime();
            

                if (strlen($data[0])<=16)
                   $fecha = $datetime->createFromFormat('d/m/Y H:i', $data[0]);
                  else
                     $fecha = $datetime->createFromFormat('d/m/Y H:i:s', $data[0]);
               
             
                $array = json_decode(json_encode($fecha), true);  
               

                $data[0]=$array['date'];
 
               
               //Insertamos los datos con los valores...
                
                $values=$values."(".$idcarga.",'".implode("','",$data)."')";
                $values = str_replace(",'')", ")", $values);
                $values=$values.","  ;
             
             if($numregistro==500)
             {  
                $sqldetalle=$sqlcabecera.$values.";";
                $sqldetalle = str_replace("),;", ");", $sqldetalle);
                
                if ($db->query($sqldetalle) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;
                
                }
                $values="";
                $numregistro=0;
              } 
                $numregistro=$numregistro+1;
               }
                //
                $numerofilas=$numerofilas+1;
               

             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);

                $sqldetalle=$sqlcabecera.$values.";";
                $sqldetalle = str_replace("),;", ");", $sqldetalle);

                if ($db->query($sqldetalle) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;

                }
 


             $sql = "INSERT into ".$table_cabecera." (c_id_carga,c_fecha_carga_ini,c_fecha_carga_fin,c_num_registro,c_id_empresa,c_id_usuario,c_id_equipo,c_nombre_archivo,c_tamanio_archivo,c_extension,c_columnas,c_nombre_sensores,c_medidas) values(";
             $sql=$sql.$idcarga.",'".$fechasistema."',now(),".($numerofilas-5).",".$_SESSION['empresa'].",".$_SESSION['codigo_usr'].",".$_POST['select_equipo'].",'".$fname."',".$_FILES['file']['size'].",'".strtolower(end($chk_ext))."','".json_encode($arrcolumna, JSON_FORCE_OBJECT)."','".json_encode($sensor, JSON_FORCE_OBJECT)."','".json_encode($medidas, JSON_FORCE_OBJECT)."');";    
             

                if ($db->query($sql) === FALSE) {
                  $jsondata["success"] = false;
                    $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
                    echo json_encode($jsondata, JSON_FORCE_OBJECT);
                    return;
                }
                       
              $sql = "ALTER TABLE ".$table_detalle." ENABLE  KEYS; ";
                
                if ($db->query($sql) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Desactivar los indices".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;
                
                }




      /*   }
         else
         {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
//ver si esta separado por " , "
             echo "Archivo invalido!";
         }*/

                    $jsondata["success"] = true;
                    $jsondata["data"] = array('message' => "Carga Correcta");
                    echo json_encode($jsondata, JSON_FORCE_OBJECT);
                  //  header("Location:carga.php");
 

    }
 
?>