<?php
error_reporting(0);
session_start();

header('Content-type: application/json; charset=utf-8');
include("conectar.php");
// Realizo consulta
$db=obtenerConexion();
//recogemos las variables post del formulario
 
$jsondata = array();
if(!isset($_POST['codigopais']))
{
   $sql="select a.Code,a.Name, a.estado from cc_pais a order by a.Name; ";
}
else
{
   $sql="select a.Code,a.Name, a.estado,a.fecha from cc_pais a where a.Code='".$_POST["codigopais"]."';";   
} 

$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Error al Ejecutar el Query ");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
      return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('id' => $obj[0],
                   'nombre' => $obj[1],
                   'estado' => $obj[2],
                   'fecha' => $obj[3]                   
                  );
}

$row_cnt = mysql_num_rows($resulset);

cerrarConexion($db, $resulset);

if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
   $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "No existen registros");
  }
  else {

  $jsondata["success"] = true;
  $jsondata["data"] = $arr;     } 
  }
  
echo json_encode($jsondata, JSON_FORCE_OBJECT);
?>

