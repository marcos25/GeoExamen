<?php
session_start();
error_reporting(1);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reactivos examen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <?php
        extract($_POST);
        if(!isset($_SESSION[alogin]))
        {
            echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=../index.php>Login</a><div>";
                exit;
        }

    include("../database.php");
    $idex = $_REQUEST['id'];
    $sql = "SELECT * From reactivosExamen WHERE IDExamen='$idex'";
    $result = mysqli_query($con,$sql);

    /*How may adjacent page links should be shown on each side of the current page link.*/
    $limit = 20;
    $adjacents = 2;
    $sql2 = "SELECT COUNT(*) 'total_rows' FROM reactivosExamen WHERE IDExamen='$idex'";
    $res = mysqli_fetch_object(mysqli_query($con, $sql2));
    $total_rows = $res->total_rows;
    $total_pages = ceil($total_rows / $limit);

    if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * From reactivosExamen WHERE IDExamen='$idex' limit $offset, $limit";
      $result = mysqli_query($con, $query);

    if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
    } else {
    if(($page - $adjacents) > 1) {
      if(($page + $adjacents) < $total_pages) {
        $start = ($page - $adjacents);
        $end   = ($page + $adjacents);
      } else {
        $start = ($total_pages - (1+($adjacents*2)));
        $end   = $total_pages;
      }
    } else {
      $start = 1;
      $end   = (1+($adjacents * 2));
    }
    }
    ?>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.php"><img src="buhos.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a class="has-arrow" href="index.php">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Home</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Inicio" href="index.php"><span class="mini-sub-pro">Inicio</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-professors.php" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Administradores</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Administradores Registrados" href="all-professors.php"><span class="mini-sub-pro">Registrados</span></a></li>
                                <li><a title="Agregar Administrador" href="../signup_admin.php"><span class="mini-sub-pro">Agregar</span></a></li>

                                <li><a title="Perfil Administrador" href="perfil-admin.php"><span class="mini-sub-pro">Perfil</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.php" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Estudiantes</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Estudiantes Registrados" href="all-students.php"><span class="mini-sub-pro">Registrados</span></a></li>

                            </ul>
                        </li>
                        <li class="active">
                            <a class="has-arrow" href="all-courses.php" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Examenes</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Lista de Examenes" href="departments.php"><span class="mini-sub-pro">Lista</span></a></li>
                                <li><a title="Agregar Examen" href="add-department.php"><span class="mini-sub-pro">Agregar</span></a></li>
                                <li><a title="Agregar Reactivos" href="agregar_reactivo.php"><span class="mini-sub-pro">Agregar Reactivos</span></a></li>
                                <li><a title="Lista Reactivos" href="lista_reactivos.php"><span class="mini-sub-pro">Lista Reactivos</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Tablas</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Resultados de Examenes" href="static-table.php"><span class="mini-sub-pro">Resultados</span></a></li>
                                <li><a title="Solicitudes de Estudiantes" href="data-table.php"><span class="mini-sub-pro">Solicitudes</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<span class="admin-name">Administrador</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="perfil-admin.php"><span class="edu-icon edu-user-rounded author-log-ic"></span>Perfil</a>
                                                        </li>
                                                        <li><a href="../signout.php"><span class="edu-icon edu-locked author-log-ic"></span>Desconectar</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.php">Inicio</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Administradores <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.php">Registrados</a>
                                                </li>
                                                <li><a href="../signup_admin.php">Agregar</a>
                                                </li>
                                                <li><a href="perfil-admin.php">Perfil</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Estudiantes <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="all-students.php">Registrados</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="#">Examenes <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="departments.php">Lista</a>
                                                </li>
                                                <li><a href="add-department.php">Agregar</a>
                                                </li>
                                                <li><a href="agregar_reactivo.php">Agregar Reactivos</a>
                                                </li>
                                                <li><a href="lista_reactivos.php">Lista Reactivos</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tablas<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.php">Resultados</a>
                                                </li>
                                                <li><a href="data-table.php">Solicitudes</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->



             <script type="text/javascript">

        function confirmar_eliminar(idex,idr){
            if(confirm("document.write(idex);")){

                document.location.replace('../admin/borrar_reactivo.php?idex='+idex+"&idr="+idr);


            }else{
                window.location.href='gestion_reactivos.php?id='+idex;
            }
        }
          </script>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li>Examenes <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Reactivos</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Lista de reactivos</h4>
                            <div class="add-product">
                                <a href="agregar_reactivoEx.php?idex=<?php echo $idex ?>">Agregar reactivos</a>
                            </div>
                            <div class="product-status-wrap drp-lst">
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>

                                        <th>ID Reactivo</th>
                                        <th>Pregunta</th>
                                        <th>ID correcta</th>

                                        <th>Acción</th>
                                    </tr>
                                    <?php
                                     while($mostrar=(mysqli_fetch_array($result))){
                                         $idr = $mostrar['IDReactivo'];
                                          $sql2 = "SELECT * From reactivos WHERE IDReactivo='$idr'";
                                            $result2 = mysqli_query($con,$sql2);
                                     while($mostrar2=(mysqli_fetch_array($result2))){
                                         ?>

                                    <tr>

                                        <td><?php echo $mostrar2['IDReactivo']?></td>
                                        <td><?php echo $mostrar2['Pregunta']?></td>
                                        <td><?php echo $mostrar2['IDCorrecta']?></td>

                                        <td><a onclick= "confirmar_eliminar(<?php echo $mostrar['IDExamen']; ?>,<?php echo $mostrar2['IDReactivo']; ?>)"> Borrar</a></td>


                                        </td>
                                    </tr>
                                <?php
                                     }
                                     }
                                     ?>

                                </table>
                            </div>
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php if($total_pages >= 1) { ?>
                                        <!-- Link of the previous page -->
                                        <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
                                          <a class='page-link' href='gestion_reactivos.php?id=<?php echo $idex; ?>?page=<?php ($page>1 ? print($page-1) : print 1)?>'>Anterior</a>
                                        </li>
                                        <!-- Links of the pages with page number -->
                                        <?php for($i=$start; $i<=$end; $i++) { ?>
                                        <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
                                          <a class='page-link' href='gestion_reactivos.php?id=<?php echo $idex; ?>?page=<?php echo $i;?>'><?php echo $i;?></a>
                                        </li>
                                        <?php } ?>
                                        <!-- Link of the next page -->
                                        <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
                                          <a class='page-link' href='gestion_reactivos.php?id=<?php echo $idex; ?>?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>Siguiente</a>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <?php mysqli_close($con); ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                              <p> Copyright © 2020. Todos los derechos reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>