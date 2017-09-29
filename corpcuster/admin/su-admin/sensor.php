<!DOCTYPE html>
<html lang="es-es" xml:lang="es-es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Administrador de WebMaster</title>
    <meta name="description" content="Pagina de Sensores de Interoc" />
    <meta name="keywords" content="Interoc, ecuador" />
    <meta name="author" content="Jonathan Lopez Torres" />
    <link rel="shortcut icon" href="../img/favicon.png" />
<style type="text/css" title="currentStyle">
      @import "../css/jquery-ui.css";
      @import "//cdn.datatables.net/1.10.8/css/jquery.dataTables.css";     
      
      @import "../css/estilo.css";
      @import "../css/bootstrap-dialog.min.css";
      @import "../css/bootstrap.min.css";
.ui-dialog-titlebar-close{
  display:none;
}

.btn-default {
    background-color: #e7e7e7 !important;
    border-color: #e7e7e7 !important;
}
</style>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script text="text/javascript" language="javascript" src="../js/bootstrap-dialog.min2.js"></script>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script text="text/javascript" language="javascript" src="../js/jquery-ui.min.js"> </script>
<script text="text/javascript" language="javascript" src="../js/dataTables.fixedHeader.js"> </script>
<script text="text/javascript" language="javascript" src="http://datatables.net/release-datatables/extensions/FixedColumns/js/dataTables.fixedColumns.js"> </script>
<script text="text/javascript" language="javascript" src="http://datatables.net/release-datatables/extensions/ColReorder/js/dataTables.colReorder.js"> </script>
 <?php

 session_start();
$rol=0;
if(isset($_SESSION["rol"]))
{
$rol=$_SESSION['rol'];
}

if($rol==1)
{
?>   


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
</head><!--/head-->
<body style="background-color: #ffffff">
     <div id="menu" class="context-menu files-menu" style="top: 215px; left: 645px;">
    <a id="atras" style="text-decoration:none;" class="context-menu-item reply-to-all" style="display: block;">Menu</a>
    <div class="context-menu-divider"></div>
    <a id="seleccionar" style="text-decoration:none;" class="context-menu-item preview-item" style="display: block;">Cargar</a>
    <a id="simular" style="text-decoration:none;" class="context-menu-item getlink-item" style="display: block;">Grafico</a>
    <div class="context-menu-divider"></div>
    <a id="recargar" style="text-decoration:none;" class="context-menu-item refresh-item" style="display: block;">Recargar</a>
  </div>
	<header id="header"><!--header-->

		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="../cliente.php"><img src="../img/logo.png" alt="" /></a>
						</div>
					
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	

	</header><!--/header-->
 
<body style="background-color: #EFEFEF;">
<style type="text/css">

.modal iframe {
    width: 100%;
    height: 100%;
}
    </style>  
    </div>
 
<div id="myModalA" title="Editar Sensor" style="overflow-x: hidden;" style="display:none;">
<form action="edito-usuario.php" method="post" enctype="multipart/form-data" name="form_editar">
   
<table>

            <tr>
                 <th style="    padding-bottom: 30px;">
                   <label >Nombre Empresa: </label>
                       <select name="select_empresa" id="select_empresa" class="form-control" disabled>      
                       </select> 
                 </th> 
                <th >
                    <label style="margin-left: 15px;">Usuario: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  disabled type="text" required name="usuario" id="usuario" value="" class="form-control" /><br /> <br />
                </th> 
            </tr>   
        <tr>    
             <th style="    padding-bottom: 30px;">
               <label >Nombre equipo: </label>
                   <select name="select_equipo" id="select_equipo" class="form-control" disabled>      
                   </select> 
             </th>    
             <th style="    padding-bottom: 30px;">
               <label style="margin-left: 15px;" >Sensor: </label>
                <select style="margin-left: 15px;" name="select_sensor" id="select_sensor" class="form-control" >
                <option value="d_sensor1s1">d_sensor1s1</option>
                <option value="d_sensor2s2">d_sensor2s2</option>
                <option value="d_sensor3s3">d_sensor3s3</option>
                <option value="d_sensor4s4">d_sensor4s4</option>
                <option value="d_sensor1s1min">d_sensor1s1min</option>
                <option value="d_sensor2s2min">d_sensor2s2min</option>
                <option value="d_sensor3s3min">d_sensor3s3min</option>
                <option value="d_sensor4s4min">d_sensor4s4min</option>
                <option value="d_sensor1s1max">d_sensor1s1max</option>
                <option value="d_sensor2s2max">d_sensor2s2max</option>
                <option value="d_sensor3s3max">d_sensor3s3max</option>
                <option value="d_sensor4s4max">d_sensor4s4max</option>
                <option value="d_sensor1s1avg">d_sensor1s1avg</option>
                <option value="d_sensor2s2avg">d_sensor2s2avg</option>
                <option value="d_sensor3s3avg">d_sensor3s3avg</option>
                <option value="d_sensor4s4avg">d_sensor4s4avg</option>
                <option value="d_sensortemperature1s1">d_sensortemperature1s1</option>
                <option value="d_sensortemperature2s2">d_sensortemperature2s2</option>
                <option value="d_sensortemperature3s3">d_sensortemperature3s3</option>
                <option value="d_4_20ma_1measai_1">d_4_20ma_1measai_1</option>
                <option value="d_genericai_1">d_genericai_1</option>
                <option value="d_genericai_1min">d_genericai_1min</option>
                <option value="d_genericai_1max">d_genericai_1max</option>
                <option value="d_genericai_1avg">d_genericai_1avg</option>
                <option value="d_lsi">d_lsi</option>
                <option value="d_rsi">d_rsi</option>
                </select>
             </th>         
        </tr>

            <tr>
                 <th >
                    <label >Nombre Sensor: </label><br />
                    <input  autocomplete="off"  type="text" required name="nombre_sensor" id="nombre_sensor" value="" class="form-control" /><br /> <br />
                 </th> 
                <th >
                    <label style="margin-left: 15px;">Medida: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  type="text" required name="medida" id="medida" value="" class="form-control" /><br /> <br />
                </th> 
            </tr>
 
             <tr>
                 <th >
                    <label >Minimo: </label><br />
                    <input  autocomplete="off"  type="number" required name="minimo" id="minimo" value="" class="form-control" /><br /> <br />
                 </th> 
                <th >
                    <label style="margin-left: 15px;">Maximo: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  type="number" required name="maximo" id="maximo" value="" class="form-control" /><br /> <br />
                </th> 
            </tr>
   
    </table>

</form>
    <input style="margin-left: 30%;"class="btn btn-default" type="buttom" onclick="editar()"name="sub" value="Editar">
</div> 
     
<div id="myModalB" title="Agregar Sensor" style="overflow-x: hidden;" style="display:none;">
<form action="agrego-usuario.php" method="post" enctype="multipart/form-data" name="form_agregar">
<table>

            <tr>
                 <th style="    padding-bottom: 30px;">
                   <label >Nombre Empresa: </label>
                       <select name="select_empresa_a" id="select_empresa_a" class="form-control" >      
                       </select> 
                 </th> 
                <!--<th >
                    <label style="margin-left: 15px;">Usuario: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  type="text" required name="usuario_a" id="usuario_a" value="" class="form-control" /><br /> <br />
                </th> -->
            </tr>   
        <tr>    
             <th style="    padding-bottom: 30px;">
               <label >Nombre equipo: </label>
                   <select name="select_equipo_a" id="select_equipo_a" class="form-control" >      
                   </select> 
             </th>    
             <th style="    padding-bottom: 30px;">
               <label style="margin-left: 15px;" >Sensor: </label>
                <select style="margin-left: 15px;" name="select_sensor_a" id="select_sensor_a" class="form-control" >
                <option value="0">Selecciona Sensor</option>
                <option value="d_sensor1s1">d_sensor1s1</option>
                <option value="d_sensor2s2">d_sensor2s2</option>
                <option value="d_sensor3s3">d_sensor3s3</option>
                <option value="d_sensor4s4">d_sensor4s4</option>
                <option value="d_sensor1s1min">d_sensor1s1min</option>
                <option value="d_sensor2s2min">d_sensor2s2min</option>
                <option value="d_sensor3s3min">d_sensor3s3min</option>
                <option value="d_sensor4s4min">d_sensor4s4min</option>
                <option value="d_sensor1s1max">d_sensor1s1max</option>
                <option value="d_sensor2s2max">d_sensor2s2max</option>
                <option value="d_sensor3s3max">d_sensor3s3max</option>
                <option value="d_sensor4s4max">d_sensor4s4max</option>
                <option value="d_sensor1s1avg">d_sensor1s1avg</option>
                <option value="d_sensor2s2avg">d_sensor2s2avg</option>
                <option value="d_sensor3s3avg">d_sensor3s3avg</option>
                <option value="d_sensor4s4avg">d_sensor4s4avg</option>
                <option value="d_sensortemperature1s1">d_sensortemperature1s1</option>
                <option value="d_sensortemperature2s2">d_sensortemperature2s2</option>
                <option value="d_sensortemperature3s3">d_sensortemperature3s3</option>
                <option value="d_4_20ma_1measai_1">d_4_20ma_1measai_1</option>
                <option value="d_genericai_1">d_genericai_1</option>
                <option value="d_genericai_1min">d_genericai_1min</option>
                <option value="d_genericai_1max">d_genericai_1max</option>
                <option value="d_genericai_1avg">d_genericai_1avg</option>
                </select>
             </th>         
        </tr>

            <tr>
                 <th >
                    <label >Nombre Sensor: </label><br />
                    <input  autocomplete="off"  type="text" required name="nombre_sensor_a" id="nombre_sensor_a" value="" class="form-control" /><br /> <br />
                 </th> 
                <th >
                    <label style="margin-left: 15px;">Medida: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  type="text" required name="medida_a" id="medida_a" value="" class="form-control" /><br /> <br />
                </th> 
            </tr>
 
             <tr>
                 <th >
                    <label >Minimo: </label><br />
                    <input  autocomplete="off"  type="number" required name="minimo_a" id="minimo_a" value="" class="form-control" /><br /> <br />
                 </th> 
                <th >
                    <label style="margin-left: 15px;">Maximo: </label><br />
                    <input style="margin-left: 15px;" autocomplete="off"  type="number" required name="maximo_a" id="maximo_a" value="" class="form-control" /><br /> <br />
                </th> 
            </tr>
   
    </table>

</form>
    <input style="margin-left: 30%; margin-top: 10px;"class="btn btn-default" type="buttom" onclick="agregar()"name="sub" value="Agregar">
</div> 

 <?php require_once 'menu.php'; ?> 
</div><!-- /.navbar-collapse -->
</nav>	

<div class="col-lg-12">
                        <div class="table-responsive">
    <div>
<table id="st_usuarios" class="table table-bordered table-hover" class="display hover" cellspacing="0" width="99.8%">
        <thead id="head_st_usuarios">
         <tr>   
            <th>Id Empresa</th>
            <th>Nombre Empresa</th>
            <th>Id Usuario</th>
            <th>Usuario</th>
            <th>Id Equipo</th>
            <th>Equipo</th>
            <th>Sensor</th>
            <th>Nombre Sensor</th>
            <th>Medida</th>
            <th>Minimo</th>
            <th>Maximo</th>
            <th>Editar</th>
            <th>Eliminar</th> 
        </tr>
        </thead>
            <tfoot id="foot_st_usuarios" >
        <tr>
            <th>Id Empresa</th>
            <th>Nombre Empresa</th>
            <th>Id Usuario</th>
            <th>Usuario</th>
            <th>Id Equipo</th>
            <th>Equipo</th>
            <th>Sensor</th>
            <th>Nombre Sensor</th>
            <th>Medida</th>
            <th>Minimo</th>
            <th>Maximo</th>
            <th>Editar</th>
            <th>Eliminar</th> 
        </tr>
           </tfoot>
       <tbody>
       </tbody>
</table>
 </div>
         
<button class="btn btn-default" style="margin-left:50%;"type="button" onclick="agregar2()" >Agregar</buttom> 

<script type="text/javascript">
    var table;
    var id_empresa      = 0;
    var id_sensor;
    var dialog_agregar; 
    var dialog;
    var counter =0;
    var id;
    var selected = new Array();
    var i=0;
    var count=0;

 
function editar()
{ 

  var nombre_sensor=jQuery("#nombre_sensor").val();

if (nombre_sensor.trim()=='')
  {
    mensajerror("Introduccir el Nombre del Sensor");
    return false;
  }

    var medida=jQuery("#medida").val();

if (medida.trim()=='')
  {
    mensajerror("Introduccir la medida del Sensor");
    return false;
  }

    var minimo=jQuery("#minimo").val();

if (minimo.trim()=='')
  {
    mensajerror("Introduccir el número máximo del Sensor");
    return false;
  }

    var maximo=jQuery("#maximo").val();

if (maximo.trim()=='')
  {
    mensajerror("Introduccir el número máximo del Sensor");
    return false;
  }


     BootstrapDialog.show({
                                title: 'Actualizacion de Sensor',
                                message: '¿Seguro desea editar el registro <b>'+jQuery("#nombre_sensor").val()+'('+jQuery("#select_sensor").val()+') de '+jQuery("#select_equipo option:selected").text()+' de la empresa '+jQuery("#select_empresa option:selected").text()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){  
                                    $.ajax({     data: {id_empresa : jQuery("#select_empresa").val()  ,usuario: jQuery("#id_usuario").val(),id_equipo: jQuery("#select_equipo").val(),sensor:jQuery("#select_sensor").val(),id_sensor:id_sensor,nombre_sensor:jQuery("#nombre_sensor").val(),medida:jQuery("#medida").val(),minimo:jQuery("#minimo").val(),maximo:jQuery("#maximo").val() },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "edito-sensor.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se modifico correctamente el registro <b>'+jQuery("#nombre_sensor").val()+'('+jQuery("#select_sensor").val()+') de '+jQuery("#select_equipo option:selected").text()+' de la empresa '+jQuery("#select_empresa option:selected").text());
                                                           dialog.dialog("close");
                                                           listar_empresa();
                                                        
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   

                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                    dialogRef.close();
                                    //location.reload(true)
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                        
                                        dialogRef.close();
                                        dialog.dialog("close");
                                    }
                                }


                                ]
                            });
        
}

function agregar()
{ 

  var nombre_sensor_a=jQuery("#nombre_sensor_a").val();

if (nombre_sensor_a.trim()=='')
  {
    mensajerror("Introduccir el Nombre del Sensor");
    return false;
  }

    var medida_a=jQuery("#medida_a").val();

if (medida_a.trim()=='')
  {
    mensajerror("Introduccir la medida del Sensor");
    return false;
  }

    var minimo_a=jQuery("#minimo_a").val();

if (minimo_a.trim()=='')
  {
    mensajerror("Introduccir el número máximo del Sensor");
    return false;
  }

    var maximo_a=jQuery("#maximo_a").val();

if (maximo_a.trim()=='')
  {
    mensajerror("Introduccir el número máximo del Sensor");
    return false;
  }


     BootstrapDialog.show({
                                title: 'Agregar de Sensor',
                                message: '¿Seguro desea editar el registro <b>'+jQuery("#nombre_sensor_a").val()+'('+jQuery("#select_sensor_a").val()+') de '+jQuery("#select_equipo_a option:selected").text()+' de la empresa '+jQuery("#select_empresa_a option:selected").text()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                     $.ajax({     data: {id_empresa : jQuery("#select_empresa_a").val()  ,id_equipo: jQuery("#select_equipo_a").val(),sensor:jQuery("#select_sensor_a").val(),nombre_sensor:jQuery("#nombre_sensor_a").val(),medida:jQuery("#medida_a").val(),minimo:jQuery("#minimo_a").val(),maximo:jQuery("#maximo_a").val() },

                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "agrego-sensor.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                            
                                                           mensaje('Se Agrego Correctamente el Sensor: <b>'+jQuery("#nombre_sensor_a").val()+'('+jQuery("#select_sensor_a").val()+') de '+jQuery("#select_equipo_a option:selected").text()+' de la empresa '+jQuery("#select_empresa_a option:selected").text());
                                                           dialog_agregar.dialog("close");
                                                           listar_empresa();
                                                          // location.reload(true)
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                    dialogRef.close();
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                        
                                        dialogRef.close();
                                        dialog_agregar.dialog("close");
                                    }
                                }


                                ]
                            });
        
}



function listar_empresa()
{

$.ajax({
                     type: "POST",
                      dataType: "json",
                      url: "../class/consulta_sensores.php",
                        })
                     .done(function( response ) {
                        clearDataTable();
                      if( response.success ) 
                      {
                           if ( console && console.log ) 
                           {

                                jQuery.each( response.data, function( key, val ) 
                                  {
                                      addDataTable(parseInt(val.s_id_empresa),(val.nombre),parseInt(val.s_id_usuario),val.usuario,parseInt(val.s_id_equipo),val.nombre_equipo,val.s_sensor,val.s_nombre_sensor,val.s_medida,(val.s_minimo),(val.s_maximo),'','');
                                  });

                          }
                       } 
                       else 
                       {
                              //response.success no es true
                              mensajerror('Problemas en : ' + response.data.message);
                       }   
                          })
             .fail(function( jqXHR, textStatus, errorThrown ) {
                 if ( console && console.log ) {
                     mensajerror( "La solicitud a fallado: " +  errorThrown);
                 }
              })
}

//se inicializa el documento
 jQuery(document).ready(function() {
$.getJSON( "../class/consulta_empresa.php",{format: "json"}) 
        .done(function( data ) {
         
         if(data.success==true)
         {
         
          var miselect=$("#select_empresa");
           var miselect_a=$("#select_empresa_a");
          
          miselect.find('option').remove().end().append('').val('');
          miselect_a.find('option').remove().end().append('').val('');
          
          miselect_a.append('<option value="-1">Seleccione Empresa</option>'); 

          $.each( data.data, function( key, val ) {
          miselect.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
          miselect_a.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
                       
          }); 
           }

var empresa_a=jQuery("#select_empresa_a option:selected").val();

listar_equipos_empresa(empresa_a,0)
}); 


function listar_equipos_empresa(empresa_prm,empresa_select)
{ 
          var miselect=$("#select_equipo");
          var miselect_a=$("#select_equipo_a");
          
          miselect.find('option').remove().end().append('').val('');
          miselect_a.find('option').remove().end().append('').val('');
 
  $.ajax({     data: {"id_empresa" : empresa_prm },
               type: "POST",
                dataType: "json",
                url: "../class/consultaequipo.php",
                  })
        .done(function( data ) {
        if(data.success==true)
         {
           
          $.each( data.data, function( key, val ) {
             miselect.append('<option  value="'+(val.equipo_id)+'">'+val.nombre_equipo+'</option>');            
             miselect_a.append('<option  value="'+(val.equipo_id)+'">'+val.nombre_equipo+'</option>');            
          }); 
       } 

       jQuery("#select_equipo").val(empresa_select); 
      
})

        .fail(function( jqxhr, textStatus, error ) {
        var err = textStatus + ", " + error;
        console.log( "Request Failed Menu: " + err );
        }); 
}

 $('#select_empresa_a').on('change', function() {
   var id_empresa_a=jQuery("#select_empresa_a option:selected").val();
   listar_equipos_empresa(id_empresa_a,0);
})

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
});

listar_empresa();

dialog = jQuery("#myModalA").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 480,
            width: 560,
            modal: true,
         
            show: {  duration: 500 ,  effect: "explode"},
            hide: {  duration: 500 ,  effect: "fold" } ,
            resizable: false ,
            draggable: false,
            buttons: { "Cerrar": 
                      function () 
                      {
                      $(this).dialog("close");
                      //sessionStorage.clear(); //Elimina todos los datos de las variables de sessionStorage
                      }
                      }
}) ;


dialog_agregar = jQuery("#myModalB").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 480,
            width: 550,
            modal: true,
            show: {  duration: 500 ,  effect: "explode"},
            hide: {  duration: 500 ,  effect: "fold" } ,
            resizable: false ,
            draggable: false,
            buttons: { "Cerrar": 
                      function () 
                      {
                      $(this).dialog("close");
                      }
                      }
}) ;




/*jQuery('#st_usuarios tbody').on( 'click', 'tr', function () {
        jQuery(this).toggleClass('selected');
        //console.dir(table.rows('.selected').data().lenth());
        selected[i]=parseInt(jQuery(this).find("td:first").html());
        i++;
    } );*/

 table = jQuery('#st_usuarios').DataTable({
   
      "autoWidth": true,
      "columnDefs": [
            {
 
                "render": function ( data, type, row ) {                  
                  return '<button class="btn btn-danger" type="button" id="editar" ><i class="fa fa-pencil"></i></buttom>';
                },
                "targets": 11
            },
            {
 
                "render": function ( data, type, row ) {                  
                  return ' <button class="btn btn-danger" type="button" id="eliminar"><i class="fa fa-trash-o"></i> </button>';
                },
                "targets": 12
            }
        ],

            "ordering": true,
            "scrollY": "360px",
            "scrollX": "99%",
            "scrollCollapse": true,
            "bDestroy": true,
            "bPaginate": true,
            "sPaginationType": "full_numbers",
             
            "searching": true,
            "lengthMenu": [[5,10,25, 50, -1], [5,10,25, 50, "Todos"]],
            "language": {
                    "url": "../json/Spanish.json"
                        }
            });

 jQuery('#st_usuarios tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        if(this.id=='eliminar')
        {
         BootstrapDialog.show({
                                title: 'Eliminacion de Sensor',
                                message: '¿Seguro desea eliminar el registro <b>'+data[7]+'('+data[6]+') de '+data[5]+' de la empresa '+data[1]+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                          
                                   $.ajax({     data: {"id_empresa" : data[0],id_usuario:data[2],id_equipo:data[4],sensor:data[6] },
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "elimino_sensor.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                           table.row('.selected').remove().draw( false );
                                                           mensaje('Se Elimino Correctamente el Sensor: '+data[7]+'('+data[6]+') de '+data[5]+' de la empresa '+data[1] );
                                                           listar_empresa();//location.reload(true);
                                                      }
                                                   } 
                                                   else 
                                                   {
                                                          //response.success no es true
                                                          mensajerror('Problemas en : ' + response.data.message);
                                                   }   
                                                      })
                                         .fail(function( jqXHR, textStatus, errorThrown ) {
                                             if ( console && console.log ) {
                                                 mensajerror( "La solicitud a fallado: " +  errorThrown);
                                             }
                                          })
                                         dialogRef.close();
                                    }

                                },
                                {
                                    id: 'btn-cancel',   
                                    icon: 'glyphicon glyphicon-log-out',       
                                    label: 'CANCEL',
                                    cssClass: 'btn-danger', 
                                    autospin: true,
                                    action: function(dialogRef){
                                      console.log($(this).parents('tr'));
                                     table.$('tr.selected').removeClass('selected');  
                                        dialogRef.close();
                                    }
                                }


                                ]
                            });
                }
                else
                {
                listar_equipos_empresa(data[0],data[4]);
                
                dialog.dialog("open");
                jQuery("#select_empresa").val(data[0])
                jQuery("#usuario").val(data[3])
            

                jQuery("#select_sensor").val(data[6])
                id_sensor=data[6];
                jQuery("#nombre_sensor").val(data[7])
                jQuery("#medida").val(data[8])
                jQuery("#minimo").val(data[9])
                jQuery("#maximo").val(data[10])             
                jQuery("#select_equipo").val(data[4])
                }
                    } );

jQuery('#st_usuarios tbody').on( 'click', 'tr', function () {
        if ( jQuery(this).hasClass('selected') ) {
            jQuery(this).removeClass('selected');
        }
        else {
            jQuery('tr.selected').removeClass('selected');
            jQuery(this).addClass('selected');
         
        }
    } );




})

function agregar2()
 {   


jQuery("#nombre_sensor_a").val("");
jQuery("#medida_a").val("");
jQuery("#minimo_a").val("");
jQuery("#maximo_a").val("");
 

      dialog_agregar.dialog("open");
 }

function addDataTable (s_id_empresa,nombre,s_id_usuario,usuario,s_id_equipo,nombre_equipo,s_sensor,nombre_sensor,medida,minimo,maximo,edit,deleted)
{
    table.row.add(  [
                    s_id_empresa,
                    nombre,
                    s_id_usuario,
                    usuario,
                    s_id_equipo,
                    nombre_equipo,
                    s_sensor,
                    nombre_sensor,
                    medida,
                    minimo,
                    maximo,
                    edit,
                    deleted
                    ] ).draw();
}

function clearDataTable ()
{
    table.rows().remove().draw(false);
}
 



//Ocultamos el menú al cargar la página
$("#menu").hide();
 
/* mostramos el menú si hacemos click derecho
con el ratón */
$(document).bind("contextmenu", function(e){
      $("#menu").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
      return false;
});
 
 
//cuando hagamos click, el menú desaparecerá
$(document).click(function(e){
      if(e.button == 0){
            $("#menu").css("display", "none");
      }
});
 
//si pulsamos escape, el menú desaparecerá
$(document).keydown(function(e){
      if(e.keyCode == 27){
            $("#menu").css("display", "none");
      }
});
             
     //controlamos los botones del menú
jQuery(document).on('click','#menu',function(e)
{   
       switch(e.target.id){

                        case "seleccionar":
                              window.location.href='../carga.php';
                              break;  
                        case "simular":
                              window.location.href='../grafico.php';
                              break;
                        case "atras":
                              window.location.href='../';
                              break;  
                       case "recargar":
                              location.reload(true);
                        break;   
                  }
});

function mensajerror (titulo){

   BootstrapDialog.show({
            title: '¡ADVERTENCIA!',
            message: titulo,
            type: BootstrapDialog.TYPE_DEFAULT, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            buttons: [{
                label: 'Ok',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        });
}



function mensaje (titulo){

   BootstrapDialog.show({
            title: 'CONFIMACION',
            message: titulo,
            type: BootstrapDialog.TYPE_DEFAULT, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: true, // <-- Default value is false
            draggable: true, // <-- Default value is false
            buttons: [{
                label: 'Ok',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }]
        });

}




</script>
  <?php  }
  else
  {
      header("Location:../logout.php");
  }

?>
</body>
</html>