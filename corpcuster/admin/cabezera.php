<!DOCTYPE php>
<php lang="en">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistema de planificación de la demanda - Gestion K.P.I</title>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jonathan Lopez Torres" />
    <meta name="description" content="Sistema de planificación de la demanda - Gestion K.P.I" />
    <meta name="keywords" content="interoc,custer, ecuador" />

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link rel="pingback" href="http://interoc-custer.com/xmlrpc.php" />
    <link rel="shortcut icon" href="http://interoc-custer.com/wp-content/uploads/2015/05/favicon.png" />

      <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">


    <!-- DropZone
    <link rel="stylesheet" href="assets/css/dropzone.min.css" />-->

  </head>
    <?php
    session_start();
        if(!isset($_SESSION["nick"]))
        {
         header('location: ../login.php');
        }
    ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
           <!-- <div class="navbar nav_title" style="border: 0;">
                <a style="font-size: 16px;"href="index.php" class="site_title"><i class="fa fa-cogs"></i> <span><?php echo $_SESSION['nombreempresa']?></span></a>
            </div>-->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <a href="index.php">
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/logotipo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido a </span>
             <span style="font-size: 16px;"><?php echo $_SESSION['nombreempresa']?></span>
              </div>
            </div>
            </a>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-line-chart"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Ventas</a></li>
                      <li><a href="index.php">Iniciativas</a></li>
                    </ul>
                  </li>
                     <?php
                        $rol=0;
                        if(isset($_SESSION["rol"]))
                        {
                        $rol=$_SESSION['rol'];
                        }

                       // if($rol == "1" or $rol == "2"  )
                       // {
                      ?>

                          <li><a><i class="fa fa-edit"></i> Administracion <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="empresa.php">Empresa</a></li>
                              <li><a href="usuario.php">Usuario</a></li>
                              <li><a href="form_validation.php">Catalogos</a></li>
                              <li><a href="form_wizards.php">Linea de Negocio</a></li>
                              <li><a href="form_upload.php">Producto</a></li>
                              <li><a href="form_buttons.php">Form Buttons</a></li>
                            </ul>
                          </li>
                       <?php
                           // }
                        ?>

                </ul>
              </div>

              <div class="menu_section">
                <h3>Planificacion</h3>
                 <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-excel-o"></i> Carga CSV Planificación<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="carga.php">Presupuesto</a></li>
                      <li><a href="carga.php">Venta</a></li>
                      <li><a href="carga.php">Base Line</a></li>
                      <li><a href="carga.php">Iniciativas Comerciales</a></li>
                      <li><a href="carga.php">iniciativas de Mercadeo</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-table"></i> Tablero de Planificación<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tablero.php">Ingreso</a></li>
                      <li><a href="chartjs2.php">Consulta</a></li>
                    </ul>
                  </li>

                </ul>
              </div>

             <div class="menu_section">
                <h3>Gestion K.P.I.</h3>
                 <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text-o"></i> Carga CSV K.P.I.<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="other_charts.php">Indicadores</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-sitemap"></i>Gráfico K.P.I.<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.php">Indicadores</a></li>
                    </ul>
                  </li>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" id="view-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>



        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/logotipo.png" alt="">Hola, <b>  <?php echo $_SESSION['nick']?> </b>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
