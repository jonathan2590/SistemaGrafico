<?php

session_start();
//error_reporting (0);
header('Content-type: application/json; charset=utf-8');
include("../configuracion/conectar.php");
include("../configuracion/log.php");

// Realizo consulta
$db=obtenerConexionSqli();


$numerofilas=1;
$numregistro=1;
$table_cabecera='db_file.cc_plantillas';
$table_detalle = 'db_file.cc_plantillas_det';

$fecha=(date("Ymd"));
$values="";
$sqldetalle="";
$sqlcabecera="";
$id_plantilla="PRE";
$idcarga=(date("YmdHis"));
$_log = new Log();
$idtrx=1003;
$_log->RegistrarLog($idcarga,$idtrx,'R','Subida de Archivo CSV :: '.$id_plantilla,$db,"INFO");
$sqlcabecera = "insert into ".$table_detalle." (cd_id_carga,cd_fecha,cd_cod_neg,cd_cod_prod,cd_umb,cd_valor_venta,cd_valor_costo,cd_cantidad) values";
$Hora = strtotime(date('H:i:s')) + (60 *60 * -7);
$fechasistema=date('Y-m-d H:i:s',$Hora) ;

set_time_limit(0);

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
	if(isset($_GET["delete"]) && $_GET["delete"] == true)
	{
		$name = $_POST["filename"];
		$chk_ext = explode(".",$name);
        $end = strrpos($name, strtolower(end($chk_ext)));
        $name = substr($name, 0, $end).$fecha.".".$_SESSION['empresa'].".".$_SESSION['codigo_usr'].".".strtolower(end($chk_ext));

		if(file_exists('./uploads/'.$name))
		{
			unlink('./uploads/'.$name);

            $sql = "Update ".$table_cabecera." set c_estado='D' where c_nombre_archivo='".$name."' and c_id_empresa=".$_SESSION['empresa']." and c_id_usuario=".$_SESSION['codigo_usr'];

            if ($db->query($sql) === FALSE) {
                $jsondata["success"] = true;
				$jsondata["data"] = array('message' => "Lo sentimos se tuvo un error interno :: ");
				echo json_encode($jsondata, JSON_FORCE_OBJECT);
				//$_log->RegistrarLog($idcarga,$idtrx,'R','Eliminacion de Archivo CSV :: '.$.$db->error." sql::".$sql,$db,"ERROR");
                return;
            }

            $jsondata["success"] = true;
			$jsondata["data"] = array('message' => "Eliminado Correctamente :: ");
			echo json_encode($jsondata, JSON_FORCE_OBJECT);

            /* cerrar la conexión */
			$db->close();


		}
		else
		{
			$jsondata["success"] = false;
			$jsondata["data"] = array('message' => "Elemento No existe / Fue eliminado / No se cargo en el servidor");
			echo json_encode($jsondata, JSON_FORCE_OBJECT);
		}
	}
	else
	{
		$file = $_FILES["file"]["name"];
		$filetype = $_FILES["file"]["type"];
		$filesize = $_FILES["file"]["size"];
        $chk_ext = explode(".",$file);
        $end = strrpos($file, strtolower(end($chk_ext)));
        $file = substr($file, 0, $end).$fecha.".".$_SESSION['empresa'].".".$_SESSION['codigo_usr'].".".strtolower(end($chk_ext));

		if(!is_dir("uploads/"))
			mkdir("uploads/", 0777);


        if(strtolower(end($chk_ext))!="csv")
        {
			$jsondata["success"] = false;
			$jsondata["data"] = array('message' => "La extension del archivo no es admitido :: ");
			echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }
		if(file_exists("uploads/".$file))
		{
			$jsondata["success"] = false;
			$jsondata["data"] = array('message' => "El archivo ya fue cargado :: ");
			echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
		}

             $sql = "INSERT into ".$table_cabecera." (c_id_carga,c_id_plantilla,c_fecha_carga_ini,c_fecha_carga_fin,c_num_registro,c_id_empresa,c_id_usuario,c_id_departamento,c_nombre_archivo,c_tamanio_archivo,c_extension) values(";
             $sql=$sql.$idcarga.",'".$id_plantilla."','".$fechasistema."',now(),".($numerofilas).",".$_SESSION['empresa'].",".$_SESSION['codigo_usr'].",0,'".$file."',".$_FILES['file']['size'].",'".$filetype." - ".strtolower(end($chk_ext))."');";


                if ($db->query($sql) === FALSE) {
					$jsondata["success"] = false;
					$jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
					echo json_encode($jsondata, JSON_FORCE_OBJECT);
                    unlink('./uploads/'.$file);
                    return;
                }
                else
                {
                	//si es correcto, entonces damos permisos de lectura para subir
		             $filename = $_FILES['file']['tmp_name'];
		             $handle = fopen($filename, "r");

                     $sql = "ALTER TABLE ".$table_detalle." DISABLE KEYS; ";

		                if ($db->query($sql) === FALSE)
		                {
						$jsondata["success"] = false;
						$jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
						echo json_encode($jsondata, JSON_FORCE_OBJECT);
		                return;

		                }



                	 while (($data = fgetcsv($handle, 1024, ";")) !== FALSE)
	                	{

	                		 $datetime = new DateTime();

 		                   if (strlen($data[0])<=16)
			                   $fecha = $datetime->createFromFormat('d/m/Y H:i', $data[0]);
			                  else
			               $fecha = $datetime->createFromFormat('d/m/Y H:i:s', $data[0]);



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

			                $numerofilas=$numerofilas+1;
			             }


	            $sqldetalle=$sqlcabecera.$values.";";
                $sqldetalle = str_replace("),;", ");", $sqldetalle);
  				//echo "2".$sqldetalle;
                if ($db->query($sqldetalle) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;

                }

                fclose($handle);

 				$sql = "ALTER TABLE ".$table_detalle." ENABLE  KEYS; ";

                if ($db->query($sql) === FALSE) {
                $jsondata["success"] = false;
                $jsondata["data"] = array('message' => "Error al Desactivar los indices".$db->error);
                echo json_encode($jsondata, JSON_FORCE_OBJECT);
                return;

                }

                 /* cerrar la conexión */
				$db->close();
                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/".$file);

					$jsondata["success"] = true;
					$jsondata["data"] = array('message' => "Se cargo correctamente la data del archivo :: ");
					echo json_encode($jsondata, JSON_FORCE_OBJECT);
                }

	}
}
