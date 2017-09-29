<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  /* CSS used here will be applied after bootstrap.css */

body { 
 background: url('admin/images/wall_1.jpg') no-repeat center center fixed !important; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

 
</style>
    <title>Interoc | CorpCuster</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
        <link rel="pingback" href="http://interoc-custer.com/xmlrpc.php" />
    <link rel="shortcut icon" href="http://interoc-custer.com/wp-content/uploads/2015/05/favicon.png" /> 
  </head>

  <body class="login">
    <div>
   

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>INTEROC</h1>
              <div>
                 <i class="user-img icons-faces-users-03"></i>
                <input id="user" 
                 data-rel="tooltip" title="Introduce el usuario"

                type="text" class="form-control" onchange="existeusuario()" placeholder="Username" required=""  />
              </div>
              <div>
                <input data-rel="tooltip" title="Introduce el password" disabled="false"   id="pass" type="password" class="form-control" onchange="login()" placeholder="Password" required="" />
              <i class="icon-lock"></i>
              </div>
              <div>

                <button class="btn btn-default submit" type="button" onclick="login()">Log in</button>
              
              </div>
           
              <div class="clearfix"></div>

              <div class="separator">
              

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-area-chart"></i> CUSTER CORPORACION</h1>
                  <p>©2017 All Rights Reserved. Sistema de planificación de la demanda - Gestion K.P.I. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>

     <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- PNotify -->
    <script src="vendors/pnotify/dist/pnotify.js"></script>
     

    <script src="vendors/login-v1.js"></script>

    

<script type="text/javascript" charset="utf-8" async defer>
 
$( document ).ready(function() {
    jQuery("#user").val("");
    jQuery("#pass").val("");
    jQuery("#user").focus();
    PNotify.removeAll();
});


 //Mensaje de Notificacion
 function _MensajeNotificacion(_titulo,_mensaje,_type,_deleteNotify)
 {

 if(_deleteNotify=="S" )
 {
    PNotify.removeAll();
 }

  var notify =  new PNotify({
                                  title: _titulo,
                                  text: _mensaje,
                                  type: _type,
                                  hide: true,
                                  closer: false,
                                  sticker: false,
                                  styling: 'bootstrap3'//,
                                  //addclass: 'dark'
                              });
 }

//Funcion que me indica si existe o no el usuario
function existeusuario() 
  {
    var usuario=jQuery("#user").val();
 
    if (usuario.trim()!='')
    {

      $.ajax({     data: {"Usuario" : usuario,"Password":'',"existe":"S" },
            type: "POST",
            dataType: "json",
            url: "admin/class/login/consulta_login.php",
            })

      .done(function( response ) {
            if( response.success ) 
            {
            
              if ( console && console.log ) 
              {
                console.log(response.data[0].estado)
                if(response.data[0].estado=="D")
                {
                 _MensajeNotificacion("Hola "+response.data[0].nombre+"","Tu usuario se encuentra Inactivo","","S")
                jQuery("#user").val("");
                jQuery("#user").focus(); 
                }
                else
                {
                 _MensajeNotificacion("Hola "+response.data[0].nombre+"","Introduce el password por favor","info","S")
                

               $( "#pass" ).prop( "disabled", false );
                 jQuery("#pass").val("");
                jQuery("#pass").focus();
                }
              }
            } 
            else 
            {
            //response.success no es true
             _MensajeNotificacion("Advertrencia!!",response.data.message,"error","S")
             jQuery("#pass" ).prop( "disabled", true );
             jQuery("#user").focus();
             jQuery("#user").val("");
                
            }   
        })

      .fail(function( jqXHR, textStatus, errorThrown ) {
          if ( console && console.log ) {
          console.log(jqXHR)
          _MensajeNotificacion("Error AJAX Consulta Login",jqXHR.responseText,"error","S")
          }
      })
     }
  }

//Funcion que valida el usuario y contraseña
  function login() 
  {
    var usuario=jQuery("#user").val();
    var password=jQuery("#pass").val();
 
    if (usuario.trim()=='')
    {
      _MensajeNotificacion("Advertencia!!","Por favor ingrese usuario","","S");
      return false;
    }

    if (password.trim()=='')
    {
      _MensajeNotificacion("Advertencia!!","Por favor ingrese password","","S");
      return false;
    }


      $.ajax({     data: {"Usuario" : usuario,"Password":password,"existe":"N" },
            type: "POST",
            dataType: "json",
            url: "admin/class/login/consulta_login.php",
            })

      .done(function( response ) {
            if( response.success ) 
            {
              if ( console && console.log ) 
              {
                  
               _MensajeNotificacion("Esperando respuesta server","Autenticando credenciales...","info","S")   
               
                // This will hold our timer
   
                setTimeout(function() {
                  setTimeout(function() {
                  
                  window.location.href = "admin/index.php"; 
                }, 1500);
              
                _MensajeNotificacion("Bienvenido "+response.data[0].nombre+"","Cargando Configuración....","success","S")   
                 
                }, 1000);
              }
            } 
            else 
            {
            //response.success no es true
             _MensajeNotificacion("Advertrencia!!",response.data.message,"error","S")
             jQuery("#pass").focus();
            }   
        })

      .fail(function( jqXHR, textStatus, errorThrown ) {
          if ( console && console.log ) {
          
          _MensajeNotificacion("Error AJAX Consulta Login",jqXHR.responseText,"error","S")
          }
      })

  }
</script>


  </body>
</html>
