<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Veterinaria S</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    
    <!-- Bootstrap 
    <link href="../../public/gente/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="../../public/gente/cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <!-- Font Awesome 
    <link href="../../public/gente/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">-->
    <!-- NProgress -->
    <link href="../../public/gente/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../public/gente/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- bootstrap-progressbar -->
    <link href="../../public/gente/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap 
    <link href="../../public/gente/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <link href="../../public/gente/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../public/gente/build/css/custom.min.css" rel="stylesheet">
    <!--seewtalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view col-info">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i><span>Paraiso Animal!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../public/gente/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>

              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  <li class="nav-item">
                        <a href="{{route('inicio.inicio')}}" class="nav-link">
                          <i class="fa fa-home"></i>INICIO
                        </a>
                  </li>
                  <li><a><i class="fa fa-edit"></i>PROPIETARIO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('propietario.index')}}">Propietario</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-paw"></i> MASCOTA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('mascota.index')}}">Mascota</a></li>


                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> CITAS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Citas</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> PRODUCTO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('producto/producto')}}">Producto</a></li>
                      <li><a href="{{url('producto/categoria')}}">Categoria</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-stethoscope"></i>VETERINARIO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('medico.index')}}">Veterinario</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-cart-arrow-down"></i>VENTA <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('venta.index')}}">Venta</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa  fa-medkit"></i>SERVICIO <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Servicio</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>REPORTE <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Reporte</a></li>
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
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../public/gente/production/images/img.jpg" alt="">Usuarios
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('perfil.perfil')}}">Perfiles</a>
                      <a class="dropdown-item"  href="{{route('usuario.index')}}">
                        <span class="badge bg-red pull-right"></span>
                        <span>Ver Usuario</span>
                      </a>
                    <a class="dropdown-item"  href="#">Ayuda</a>
                    <a class="dropdown-item"  href="{{route('login.login')}}"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
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
                    <li class="nav-item">
                      <a class="dropdown-item">
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
                    <li class="nav-item">
                      <a class="dropdown-item">
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
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../../public/gente/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Silvia Peña</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
              <section class="content">
                @yield('content')
              </section>
              </div>
            </div>

          </div>


          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery
    <script src="../../public/gente/vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <script src="../../public/gente/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../public/gente/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../public/gente/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js 
    <script src="../../public/gente/vendors/Chart.js/dist/Chart.min.js"></script>-->
    <!-- gauge.js -->
    <script src="../../public/gente/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../public/gente/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../public/gente/vendors/iCheck/icheck.min.js"></script>

    <!-- Skycons -->
    <script src="../../public/gente/vendors/skycons/skycons.js"></script>
    <!-- Flot 
    <script src="../../public/gente/vendors/Flot/jquery.flot.js"></script>
    <script src="../../public/gente/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../public/gente/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../public/gente/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../public/gente/vendors/Flot/jquery.flot.resize.js"></script>-->
    <!-- Flot plugins 
    <script src="../../public/gente/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../public/gente/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../public/gente/vendors/flot.curvedlines/curvedLines.js"></script>-->
    <!-- DateJS -->
    <script src="../../public/gente/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../public/gente/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../public/gente/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../public/gente/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../public/gente/vendors/moment/min/moment.min.js"></script>

    <script src="../../public/gente/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../public/gente/build/js/custom.min.js"></script>
    
  </body>
</html>
