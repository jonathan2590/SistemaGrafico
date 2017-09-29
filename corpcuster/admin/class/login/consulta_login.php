<?php
//iniciamos la sesión
session_start();

header('Content-type: application/json; charset=utf-8');
include("../configuracion/conectar.php");
include("../configuracion/log.php");
// Realizo consulta

$db=obtenerConexion();
$db2=obtenerConexionSqli();  
//recogemos las variables post del formulario

$idtrx=1001;
$idsesion=(date("YmdHis"));
$_log = new Log();

if( isset($_POST["existe"]) ) 
  {
     $existe = mysql_real_escape_string($_POST['existe']);
  } 
  else 
  {
     $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "Existe obligatorio");
     echo json_encode($jsondata, JSON_FORCE_OBJECT); 
     return;
  }

if( isset($_POST["Usuario"]) ) 
  {
     $nombre = mysql_real_escape_string($_POST['Usuario']);
  } 
  else 
  {
     $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "Usuario obligatorio");
     $_log->RegistrarLog($idtrx, $idsesion,'C',"Usuario obligatorio :: Usuario ::".$nombre,$db2,"ERROR");
     echo json_encode($jsondata, JSON_FORCE_OBJECT); 
     return;
  }

 if( isset($_POST["Password"]) ) 
  {
     $password = mysql_real_escape_string($_POST['Password']);
  } 
  else 
  {
     $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "Password obligatorio");
     $_log->RegistrarLog($idtrx, $idsesion,'C',"Password obligatorio :: Usuario ::".$nombre,$db2,"ERROR");
     echo json_encode($jsondata, JSON_FORCE_OBJECT); 
     return;
  }
  
if($existe=="N"){  
$sql="select user_id,(u.nombre), empresa_id,rol,upper(e.nombre ) from db_admin.usuarios u , empresas e where empresa_id=e.id and usuario='".$nombre."' and  pass='".($password)."';";

$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Lo sentimos ha ocurrido un error interno, por favor comuniquese con el departamento de soporte. CodError::".$idsesion );
            $_log->RegistrarLog($idtrx, $idsesion,'E',"Error al Ejecutar el Query :: ".mysql_error()." :: Usuario :: ".$nombre,$db2,"ERROR");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
            return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('user_id' => $obj[0],
                   'nombre' => $obj[1],
                   'empresa' => $obj[2],
                   'rol' => $obj[3],
                   'nombreempresa' => $obj[4]                   
                  );
}
  


$row_cnt = mysql_num_rows($resulset);

   
if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
   $jsondata["success"] = false;
   $jsondata["data"] = array('message' => "Password incorrecto");
   $_log->RegistrarLog($idtrx,$idsesion,'R',"Usuario :: ".$nombre." :: password incorrecto",$db2,"ERROR");
  }
  else {
  $_SESSION['codigo_usr'] = $arr[0]["user_id"]; 
  $_SESSION['nick'] = $arr[0]["nombre"]; 
  $_SESSION['empresa'] = $arr[0]["empresa"];  
  $_SESSION['rol'] = $arr[0]["rol"];  
  $_SESSION['nombreempresa'] = $arr[0]["nombreempresa"];  
  $_infoIngreso="IP: ".$_SERVER['REMOTE_ADDR']." HTTP_HOST: ".$_SERVER['HTTP_HOST']." HTTP_REFERER: ".$_SERVER['HTTP_REFERER']." HTTP_USER_AGENT: ".
                             $_SERVER['HTTP_USER_AGENT']." REQUEST_URI: ".
                             $_SERVER['REQUEST_URI'];

  $_log->RegistrarLog($idtrx,$idsesion,'R',"Usuario :: ".$nombre." :: ingreso correcta ".$_infoIngreso,$db2,"INFO");
  $jsondata["success"] = true;
  $jsondata["data"] = $arr;     } 
  }
  
cerrarConexion($db, $resulset);
  }
else
{
$sql="select (u.nombre), upper(e.nombre ),u.estado from db_admin.usuarios u , empresas e where empresa_id=e.id and  usuario='".$nombre."';";  


$resulset = mysql_query($sql);
        
 if(!$resulset){ //Si hubo error al insertar, se avisa
            $jsondata["success"] = false;
            $jsondata["data"] = array('message' => "Lo sentimos ha ocurrido un error interno, por favor comuniquese con el departamento de soporte. CodError::".$idsesion );
            $_log->RegistrarLog($idtrx, $idsesion,'E',"Error al Ejecutar el Query :: ".mysql_error()." :: Usuario :: ".$nombre,$db2,"ERROR");
            echo json_encode($jsondata, JSON_FORCE_OBJECT);
      return;
        }

$arr = array();

while ($obj = mysql_fetch_row($resulset)) {
    $arr[] = array('nombre' => $obj[0],
                   'nombreempresa' => $obj[1],
                   'estado' => $obj[2]                   
                  );
}
  


$row_cnt = mysql_num_rows($resulset);

   
if($resulset){ //Si resultado es true, se agregó correctamente
 
 if ($row_cnt==0){
   $jsondata["success"] = false;
     $jsondata["data"] = array('message' => "Usuario :: ".$nombre." :: no existe / No tiene Asignado ninguna empresa"  );
     $_log->RegistrarLog($idtrx,$idsesion,'R',"Usuario :: ".$nombre." :: no existe / No tiene Asignado ninguna empresa",$db2,"ERROR");
  }
  else {
  $_log->RegistrarLog($idtrx,$idsesion,'R',"Usuario :: ".$nombre." :: validacion de usuario exitoso",$db2,"INFO");
  $jsondata["success"] = true;
  $jsondata["data"] = $arr;     
 } 
  }

cerrarConexion($db, $resulset);
}

echo json_encode($jsondata, JSON_FORCE_OBJECT); 
?>

