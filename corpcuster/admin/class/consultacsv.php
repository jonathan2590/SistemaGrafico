<?php
error_reporting (0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$dateini = new DateTime($_POST['fechaini']);
$datefin = new DateTime($_POST['fechafin']);

 

 $fechaini=$_POST['fechaini'];//date_format($dateini, 'd/m/Y');
 $fechafin=$_POST['fechafin'];//date_format($datefin , 'd/m/Y');


$jsondata = array();
$sql="select concat(CONVERT(UNIX_TIMESTAMP(b.d_date)-14400,char(20)),'000')
d_date,trim(b.".$_POST['select_sensor']."),c_medidas,c_nombre_sensores,c_columnas,b.d_date from cabecera_sensores a , log_sensores b where a.c_id_carga=b.d_id_carga and c_estado='A'
and b.d_date>='".$fechaini." ".$_POST['tiempoini']."' and b.d_date<='".$fechafin." ".$_POST['tiempofin']."' and a.c_id_empresa=".$_SESSION['empresa']." and c_id_equipo=".$_POST['id_equipo']."
group by trim(b.d_sensor1s1),c_medidas,c_nombre_sensores,c_columnas,b.d_date 
order by d_date;";
 
$resulset = mysql_query($sql);

        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
			return;
        }

$arr = array();

$excel = array();



while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array( (float)$obj[0],
	                 (float)$obj[1]
	                   
        );

   $excel[] = array( $obj[5],
	                 (float)$obj[1]);

    $medidas=json_decode($obj[2]);
    $sensor=json_decode($obj[3]);
    $columna=json_decode($obj[4]);
       
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);


$array[]=($medidas);
$medida= ($array);

$arraysensor[]=($sensor);
$sensores= ($arraysensor); 

$arraycolumna[]=($columna);
$columnas= ($arraycolumna); 
  
if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
	 $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "No existes datos para el criterio de busqueda");
	}
	else {

	$jsondata["success"] = true;
	$jsondata["data"] = $arr;
	$jsondata["medidas"] = $medida;
	$jsondata["sensores"] = $sensores; 
	$jsondata["columnas"] = $columnas; 
	$jsondata["excel"] = $excel; 
	
	    } 
	}

	$pos=0;
 



	
echo json_encode($jsondata);
?>

