<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Department | Kiaalap - Kiaalap Admin Template</title>
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
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
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
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>No has iniciado sesión. Ingresa para acceder a esta página.</h2>";
	echo "<a href=../index.php><h3 align=center>Haga clic aquí para iniciar sesión</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");
$idex = $_REQUEST['idex'];

?>

    <SCRIPT LANGUAGE="JavaScript">
                function check() {
                preg=document.form1.preg.value;
                if (preg.length<1) {
                alert("Por favor introduzca la pregunta");
                document.form1.preg.focus();
                bool = 0;
                return false;
                }
                a=document.form1.a.value;
                if(a.length<1) {
                alert("Por favor ingrese inciso a");
                document.form1.a.value;
                return false;
                }
                b=document.form1.b.value;
                if(b.length<1) {
                alert("Por favor ingrese inciso b");
                document.form1.b.value;

                return false;
                }
                n=document.form1.n.value;
                if(n.length<1) {
                alert("Por favor ingrese la fecha1");
                document.form1.n.value;

                return false;
                }
                preg=document.form1.preg2.value;
                if (preg.length<1) {
                alert("Por favor introduzca la pregunta");
                document.form1.preg.focus();
                bool = 0;
                return false;
                }
                a=document.form1.a2.value;
                if(a.length<1) {
                alert("Por favor ingrese inciso a");
                document.form1.a2.value;
                return false;
                }
                b=document.form1.b2.value;
                if(b.length<1) {
                alert("Por favor ingrese inciso b");
                document.form1.b.value;

                return false;
                }
                n=document.form1.n2.value;
                if(n.length<1) {
                alert("Por favor ingrese la fecha2");
                document.form1.n.value;
                return false;
                }
                preg=document.form1.preg3.value;
                if (preg.length<1) {
                alert("Por favor introduzca la pregunta");
                document.form1.preg.focus();
                return false;
                }
                a=document.form1.a3.value;
                if(a.length<1) {
                alert("Por favor ingrese inciso a");
                document.form1.a.value;
                return false;
                }
                b=document.form1.b3.value;
                if(b.length<1) {
                alert("Por favor ingrese inciso b");
                document.form1.b.value;

                return false;
                }
                n=document.form1.n3.value;
                if(n.length<1) {
                alert("Por favor ingrese la fecha3");
                document.form1.n.value;

                return false;
}




return true;
}
</script>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.php"><img src="img/logo/logosn.png" alt="" /></a></strong>
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
                                <li><a title="Agregar Administrador" href="../signup.php"><span class="mini-sub-pro">Agregar</span></a></li>

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
                                                <li><a href="../signup.php">Agregar</a>
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
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li>Examenes <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Reactivos</span>
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
        <!-- Single pro tab review Start-->



        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Agregar reactivo</a></li>

                            </ul>
                            </script>
                            <form name="form1" method="post" action="../admin/pregunta_nuevaEx.php?idex=<?php echo $idex ?>"  onSubmit="return check();">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form id="add-department" action="#" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="preg" type="text" class="form-control" placeholder="pregunta 1" id ="preg">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="a" type="text" class="form-control" placeholder="inciso a" id = "a">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="b" type="text" class="form-control" placeholder="inciso b" id ="b">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="c" type="text" class="form-control" placeholder="inciso c" id = "c">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="d" type="text" class="form-control" placeholder="inciso d" id = "d">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                <?php
                                                                    //imprime el primer inciso del reactivo
                                                                    echo "Seleccione el inciso correspondiente a la respuestas correcta:";

                                                                ?>
                                                                </br>
                                                                <input  type=radio name='n' value="1" id = "n">
                                                                <?php
                                                                //imprime el primer inciso del reactivo
                                                                echo "a)";

                                                            ?>
                                                            </br>
                                                            <input  type=radio name='n' value="2" id = "n">
                                                                <?php
                                                                //imprime el primer inciso del reactivo
                                                                echo "b)";

                                                            ?>
                                                             </br>
                                                            <input  type=radio name='n' value="3" id = "n">
                                                                <?php
                                                                //imprime el primer inciso del reactivo
                                                                echo "c)";

                                                            ?>
                                                             </br>
                                                            <input  type=radio name='n' value="4" id = "n">
                                                                <?php
                                                                //imprime el primer inciso del reactivo
                                                                echo "d)";

                                                            ?>
                                                            </div>

                                                        </div>
                                                    </div>




                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                </scritp>
                                </form>
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
                            <p>Copyright © 2020. Todos los derechos reservados</p>
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
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>