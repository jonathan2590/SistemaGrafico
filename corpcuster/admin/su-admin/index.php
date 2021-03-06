<!DOCTYPE html>
<html lang="es-es" xml:lang="es-es" xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="http://interoc-custer.com/wp-content/uploads/2015/05/favicon.png" /> 
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Administrador de WebMaster</title>    
    <meta name="description" content="Pagina de Empresa" />
    <meta name="keywords" content="interoc,webmas, ecuador" />
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
 
<div id="myModalA" title="Editar Empresa" style="overflow-x: hidden;" style="display:none;">
<form action="edito-empresa.php" method="post" enctype="multipart/form-data" name="form_editar">
   
<table>

        <tr>
            
            <th>            
            <input type="hidden" required name="empresa" id="empresa" value="" class="form-control" />
                <label>Nombre: </label><br />
                <input type="text" required name="nombre" id="nombre" value="" class="form-control" />
            </th>           
        </tr>
                  
        <tr>
            
            <th>
                  <label>Logo: </label><br />
                  <input id="imagen" name="imagen" value="" class="form-control" size="10" type="file" /><br />
            </th>          
        </tr> 

        <tr>
            <th>
                  <label>País: </label><br />
                  <select id="select_pais" name="select_pais" class="form-control"> 
                      
                  </select>  <br/>
            </th>
        </tr>   

        <tr>
            <th>
                  <label>Estado: </label><br />
                 <select  id="select_estado" name="select_estado" class="form-control"> 
                     <option value="A"> Activo</option> 
                     <option value="I"> Inactivo</option> 
                  </select>  
              <br/>
            </th>
        </tr>  
        <tr>
            <th>
                  <label>Email: </label><br />
                 <input name="email" id="email" class="form-control" type="text" /><br />
              
            </th>
        </tr>           
        <tr>
            <th>
                  <label>Nemónico: </label><br />
                  <input name="nemonico"  id="nemonico"  class="form-control" type="text" /><br />
            </th>
        </tr>   
        <tr>
            <th>
                  <label>URL: </label><br />
                  <input id="url" name="url" class="form-control" type="text" /><br />
            </th>
        </tr>   
 
     
    </table>

</form>
    <input style="margin-left: 30%;margin-top: 30px;" class="btn btn-danger" type="buttom" onclick="editar()"name="sub" value="Editar">
</div> 
     
<div id="myModalB" title="Agregar Empresa" style="overflow-x: hidden;" style="display:none;">
<form action="agrego-empresa.php" method="post" enctype="multipart/form-data" name="form_agregar">
   
<table>

       <tr>
           <th>
                <label>Nombre: </label><br />
                <input type="text" required name="nombre" id="nombre_a" value="" class="form-control" /><br />
            </th>           
        </tr>
                  
        <tr>
            
            <th>
                  <label>Logo: </label><br />
                  <input id="imagen" name="imagen" value="" class="form-control" size="10" type="file" /> <br/>
            </th>          
        </tr> 
        <tr>
            <th>
                  <label>País: </label><br />
                  <select id="select_pais_a" name="select_pais_a" class="form-control"> 
                      
                  </select>  <br/>
            </th>
        </tr>   
        <tr>
            <th>
                  <label>Email: </label><br />
                 <input name="email" id="email_a" class="form-control" type="text" /><br />
            </th>
        </tr>           
        <tr>
            <th>
                  <label>Nemónico: </label><br />
                  <input name="nemonico"  id="nemonico_a"  class="form-control" type="text" /><br />
            </th>
        </tr>   
        <tr>
            <th>
                  <label>URL: </label><br />
                  <input id="url_a" name="url"  class="form-control" type="text" />
            </th>
        </tr>   

  </table>

  <input style="margin-left: 30%;margin-top: 8px;" class="btn btn-danger" type="buttom" onclick="agregar()" name="sub" value="Agregar">
</form>
    
  
    
</div> 


<?php require_once 'menu.php'; ?> 
</div><!-- /.navbar-collapse -->
</nav>	

<div class="col-lg-12">
                        <div class="table-responsive">
    <div>
<table id="st_empresas" class="table table-bordered table-hover" class="display hover" cellspacing="0" width="99.8%">
        <thead id="head_st_empresas">
         <tr>   
            <th>Id Empresa</th>
            <th>Nombre</th>
            <th>Logo</th>
            <th>Url</th>
            <th>Email</th>            
            <th>Nemónico</th>
            <th>País</th>
            <th>Id Estado</th>
            <th>Usuario</th>
            <th>Editar</th> 
            <th>Eliminar</th> 
            
        </tr>
        </thead>
        <!--tfoot id="foot_st_empresas" >
         <tr>
          <th>Id Empresa</th>
          <th>Nombre</th>
          <th>Logo</th>
          <th>Url</th>
          <th>Editar</th>
          <th>Eliminar</th> 
          </tr>
       </tfoot-->
       <tbody>
       </tbody>
</table>
 </div>
         
<button class="btn btn-danger" style="margin-left:50%;"type="button" onclick="agregar2()" >Agregar</buttom> 

<script type="text/javascript">
    var table;
    var id_empresa      = 0;
    var dialog_agregar; 
    var dialog;
    var counter =0;
    var id;
    var selected = new Array();
    var i=0;
    var count=0;

 
function editar()
{ 
  var nombre_empresa=jQuery("#nombre").val();
  var email_empresa=jQuery("#email").val();
  var nemonico_empresa=jQuery("#nemonico").val();
  var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
  var url_empresa=jQuery("#url").val();
  var pais=jQuery("#select_pais").val();
  
if (nombre_empresa.trim()=='')
  {
    mensajerror("Introduccir el nombre de la empresa");
    return false;
  }

if (email_empresa.trim()=='')
  {
    mensajerror("Introduccir el Email de la empresa");
    return false;
  }

if (caract.test(email_empresa) == false){
        mensajerror("El email de la empresa no es válido");
        document.form_agregar.email_a.value="";
        return false;
}

if (nemonico_empresa.trim()=='')
  {
    mensajerror("Introduccir el nemónico de la empresa");
    return false;
  }

if (url_empresa.trim()=='')
  {
    mensajerror("Introduccir la url de la empresa");
    return false;
  }
     BootstrapDialog.show({
                                title: 'Actualización de Empresas',
                                message: '¿Seguro desea editar el registro <b>'+jQuery("#nombre").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){  
                                    document.form_editar.submit() 
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
                                        dialog.dialog("close");
                                    }
                                }


                                ]
                            });
        
}

function agregar()
{ 
var valida=0;
var nombre_empresa=jQuery("#nombre_a").val();
var email_empresa=jQuery("#email_a").val();
var nemonico_empresa=jQuery("#nemonico_a").val();
var pais_empresa=jQuery("#select_pais_a").val();

var url_empresa=jQuery("#url_a").val();
var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

if (nombre_empresa.trim()=='')
  {
    mensajerror("Introduccir el nombre de la empresa");
    return false;
  }

if (pais_empresa <= '0')
  {
    mensajerror("No ha seleccionado el País");
    return false;
  }  

if (email_empresa.trim()=='')
  {
    mensajerror("Introduccir el Email de la empresa");
    return false;
  }

if (caract.test(email_empresa) == false){
        mensajerror("El email de la  empresa no es válido");
        document.form_agregar.email_a.value="";
        return false;
}

if (nemonico_empresa.trim()=='')
  {
    mensajerror("Introduccir el nemónico de la empresa");
    return false;
  }


if (url_empresa.trim()=='')
  {
    mensajerror("Introduccir la url de la empresa");
    return false;
  }

     BootstrapDialog.show({
                                title: 'Agregar de Empresas',
                                message: '¿Seguro desea agregar el registro <b>'+jQuery("#nombre_a").val()+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                    document.form_agregar.submit();
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
                      url: "../class/consulta_empresa.php",
                        })
                     .done(function( response ) {
                        clearDataTable();
                      if( response.success ) 
                      {
                           if ( console && console.log ) 
                           {

                            jQuery.each( response.data, function( key, val ) 
                              {                                  
                            addDataTable(parseInt(val.id),(val.nombre),(val.logo),(val.url),(val.email),(val.nemonico),(val.pais),(val.estado),(val.usuario));
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

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
});
 

listar_empresa();

dialog = jQuery("#myModalA").dialog({ 
            autoOpen: false,closeOnEscape: true,//closeText: 'Cerrar',
            height: 540,
            width: 500,
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
            height: 580,
            width: 500,
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


$.getJSON( "../class/consulta_pais.php",{format: "json"}) 
        .done(function( data ) {
         
         if(data.success==true)
         {
         
          var miselect=$("#select_pais");
           var miselect_a=$("#select_pais_a");
          
          miselect.find('option').remove().end().append('').val('');
          miselect_a.find('option').remove().end().append('').val('');
          
            
          miselect_a.append('<option value="0">Seleccione País</option>'); 

          $.each( data.data, function( key, val ) {
          miselect.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 
          miselect_a.append('<option  value="'+(val.id)+'">'+val.nombre+'</option>'); 

          }); 
           }
});

/*jQuery('#st_empresas tbody').on( 'click', 'tr', function () {
        jQuery(this).toggleClass('selected');
        //console.dir(table.rows('.selected').data().lenth());
        selected[i]=parseInt(jQuery(this).find("td:first").html());
        i++;
    } );*/

 table = jQuery('#st_empresas').DataTable({
   
      "autoWidth": true,
      "columnDefs": [
            {
 
                "render": function ( data, type, row ) {
                  return '<button class="btn btn-danger" type="button" id="editar" ><i class="fa fa-pencil"></i></buttom>';
                },
                "targets": 9
            },
            {
 
                "render": function ( data, type, row ) {
                  return ' <button class="btn btn-danger" type="button" id="eliminar"><i class="fa fa-trash-o"></i> </button>';
                },                
                "targets": 10
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

 jQuery('#st_empresas tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        if(this.id=='eliminar')
        {
         BootstrapDialog.show({
                                title: 'Eliminación de Empresas',
                                message: '¿Seguro desea eliminar el registro <b>'+data[1]+'</b> ?',
                                buttons: [{
                                    id: 'btn-ok',   
                                    icon: 'glyphicon glyphicon-check',       
                                    label: 'OK',
                                    cssClass: 'btn-primary', 
                                    autospin: true,
                                    action: function(dialogRef){    
                                          
                                   $.ajax({     data: {"id" : data[0]},
                                                 type: "POST",
                                                  dataType: "json",
                                                  url: "elimino_empresa.php",
                                                    })
                                                 .done(function( response ) {
                                                  if( response.success ) 
                                                  {
                                                       if ( console && console.log ) 
                                                       {
                                                           table.row('.selected').remove().draw( false );
                                                           listar_empresa();
                                                           mensaje('Se Elimino Correctamente la empresa: ' + data[1]);
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
                dialog.dialog("open");
                id_empresa=data[0];
                jQuery("#empresa").val(data[0])
                jQuery("#nombre").val(data[1])

                var chooser = document.querySelector('#imagen');
                var choosed_file_path =  "../img/"+data[2]; 
                chooser.addEventListener("change", function(evt) {   
                 
                    choosed_file_path = "../img/"+data[2];
                }, false);

               jQuery("#url").val(data[3])
               jQuery("#email").val(data[4])
               jQuery("#nemonico").val(data[5])
               jQuery("#select_estado").val(data[7])
               jQuery("#select_pais").val(data[6])
               
                }
                    } );

jQuery('#st_empresas tbody').on( 'click', 'tr', function () {
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
      jQuery("#url_a").val("");
      jQuery("#nombre_a").val("");
      dialog_agregar.dialog("open");
 }

function addDataTable (id,nombre,logo,url,email,nemonico,date,simulacion,edit,deleted)
{
    table.row.add(  [
                    id,
                    nombre,
                    logo,
                    url,
                    email,
                    nemonico,
                    date,
                    simulacion,
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