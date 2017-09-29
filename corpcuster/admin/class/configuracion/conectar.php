<?php
    require_once ("configuracion.php");
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json'); 
    header("Content-Type: text/html; charset=iso-8859-1"); 


    function obtenerConexionSqli() {
    $config = new Config();//nombre de la clase del include
    $db = $config->db ;
    $host = $config->host ;    
    $user = $config->user; 
    $password = $config->password; 

    $mysqli = new mysqli($host, $user,$password, $db);
    if ($mysqli -> connect_errno) {
    die( "Fallo la conexión a MySQL: (".$mysqli -> mysqli_connect_errno().") ".$mysqli -> mysqli_connect_error());
    }
    return  $mysqli; 
    }

    function obtenerConexion() {
    $config = new Config();//nombre de la clase del include
    $db = $config->db ;
    $host = $config->host ;    
    $user = $config->user; 
    $password = $config->password; 
    $link = mysql_connect($host, $user, $password) or die('Fallo la conexión :: ' .mysql_error());
    mysql_select_db($db,$link) or die('No se pudo seleccionar la base de datos '.mysql_error() );
    return  $link; 
    }

    function cerrarConexion($db, $query) {
        //mysql_free_result($query);
        mysql_close($db);
         
    }

    function ejecutarQuery($db, $sql) {
        if(!$resultado = mysql_query($sql)){
            die('Consulta Fallida [' . $db->error . ']');
        }

        return $resultado;
    }
?>