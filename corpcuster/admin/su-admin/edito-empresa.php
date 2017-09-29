 
<?php 

session_start();
  
//echo $rec
header('Content-type: application/json; charset=utf-8');
include("../class/conectar.php");

// Realizo consulta
$db=obtenerConexionSqli();
 
$nombre=$_POST['nombre'];
$url=$_POST['url'];
$nemonico=$_POST['nemonico'];
$email=$_POST['email'];
$rec=$_POST['empresa']; 
$pais=$_POST['select_pais']; 
$estado=$_POST['select_estado']; 

$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];

 
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES['imagen']["type"] == "image/gif")
   || ($_FILES['imagen']["type"] == "image/jpeg")
   || ($_FILES['imagen']["type"] == "image/jpg")
   || ($_FILES['imagen']["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/img';
      // Muevo la'imagen'desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
 	  
    } 
 
$table='empresas';
$campo='id';

if ($nombre_img=='')
{
$sql = "update ".$table." set nombre='".$nombre."',url='".$url."',id_pais='".$pais."',estado='".$estado."',email='".$email."',nemonico='".$nemonico."' , fechamodificacion=now(), id_usuario=".$_SESSION['codigo_usr']." where " .$campo."=".$rec;
}
else 
{
$sql = "update ".$table." set logo='".$nombre_img."',email='".$email."',nemonico='".$nemonico."',nombre='".$nombre."',id_pais='".$pais."',estado='".$estado."',url='".$url."' , fechamodificacion=now(), id_usuario=".$_SESSION['codigo_usr']." where " .$campo."=".$rec;
 }
 
if ($db->query($sql) === FALSE) {
    $jsondata["success"] = false;
    $jsondata["data"] = array('message' => "Error al Ejecutar el Query ".$db->error);
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    return;
}
else
{

	$jsondata["success"] = true;
	$jsondata["data"] = array('message' => "ok"); 
}

    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    header("Location:index.php");
    

 ?>