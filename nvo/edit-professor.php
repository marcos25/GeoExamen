<?php
session_start();
error_reporting(1);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Professor | Kiaalap - Kiaalap Admin Template</title>
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
    <!-- Funciones JS
		============================================ -->
    <script language="javascript">
        function check()
        {
            if(document.form1.lid.value=="")
            {
                alert("Ingrese un expediente");
                document.form1.lid.focus();
                return false;
            }

            if(document.form1.name.value=="")
            {
                alert("Por favor, escriba su nombre");
                document.form1.name.focus();
                return false;
            }

            if(document.form1.email.value=="")
            {
                alert("Por favor, introduzca su dirección de correo electrónico");
                document.form1.email.focus();
                return false;
            }

            e = document.form1.email.value;
            f1 = e.indexOf('@');
            f2 = e.indexOf('@',f1+1);
            e1 = e.indexOf('.');
            e2 = e.indexOf('.',e1+1);
            n = e.length;

            if(!(f1 > 0 && f2 == -1 && e1 > 0 && e2 == -1 && f1 != e1 + 1 && e1 != f1 + 1 && f1 != n - 1 && e1 != n - 1))
            {
                alert("Por favor introduzca un correo electrónico válido");
                document.form1.email.focus();
                return false;
            }
           <?php>
           $pass = password_hash($_POST[´pass´],PASSWORD_BCRYPT);
           ?>
          return true;
      }
    </script>

    <script>
        $(document).ready(function () {
            $("#lid").keyup(checarExpediente);
        });

        $(document).ready(function () {
            $("#lid").change(checarExpediente);
        });

        $(document).ready(function () {
            $("#name").keyup(checarUsuarios);
        });

        $(document).ready(function () {
            $("#name").change(checarUsuarios);
        });

        $(document).ready(function () {
            $("#email").keyup(checarEmails);
        });

        $(document).ready(function () {
            $("#email").change(checarEmails);
        });

        function checarExpediente() {
            var lid = document.getElementById('lid').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("checkexp").innerHTML = xhttp.responseText;
                    expresponsed = document.getElementById('expchecker').value;
                    if (expresponsed == "1"){
                        if (emailresponsed){
                            emailresponsed=document.getElementById('emailchecker').value;
                            if (emailresponsed == "1"){
                                if (usernameresponsed){
                                    usernameresponsed=document.getElementById('usernamechecker').value;
                                    if (usernameresponsed == "1"){
                                    document.getElementById("thesubmitBoton").disabled = false;
                                    }
                                }
                            }
                        }
                    }
                    else if (expresponsed == "0")
                    {
                        document.getElementById("thesubmitBoton").disabled = true;
                    }
                }
            };
        }
        function checarUsuarios() {
            var name= document.getElementById('name').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("checkusername").innerHTML = xhttp.responseText;
                    usernameresponsed = document.getElementById('usernamechecker').value;
                    if (usernameresponsed=="1"){
                       if (emailresponsed){
                            emailresponsed=document.getElementById('emailchecker').value;
                            if (emailresponsed=="1"){
                                if (expresponsed)
                                {
                                    expresponsed=document.getElementById('expchecker').value;
                                    if (expchecker=="1"){
                                        document.getElementById("thesubmitBoton").disabled = false;
                                    }
                                }
                            }
                        }
                    }
                    else if (usernameresponsed=="0"){
                        document.getElementById("thesubmitBoton").disabled = true;
                    }
                }
            };
        }

        function checarEmails() {
            var email = document.getElementById('email').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("checkemailresponse").innerHTML = xhttp.responseText;
                emailresponsed = document.getElementById('emailchecker').value;
                if (emailresponsed=="1")
                {
                    if (usernameresponsed)
                    {
                        emailresponsed=document.getElementById('usernamechecker').value;
                        if (usernameresponsed=="1"){
                            if (expresponsed)
                            {
                                expresponsed=document.getElementById('expchecker').value;
                                if (expchecker=="1"){
                                    document.getElementById("thesubmitBoton").disabled = false;
                                }
                            }
                        }
                    }
                }
                else if (emailresponsed=="0")
                {
                    document.getElementById("thesubmitBoton").disabled = true;
                }
                }
            };
        }
    </script>
</head>

<body>
    <?php
    if(!isset($_SESSION[alogin]))
    {
    	echo "<BR><BR><BR><BR><div class=head1>Usted no se ha identificado<br> Por favor <a href=../index.php>Login</a><div>";
    		exit;
    }
    include("../database.php");
    $tipo = $_REQUEST['tipo'];
	$id = $_REQUEST['id'];
	$idex = $_REQUEST['idex'];
	$sql = "SELECT * From usuarios WHERE ID='$id'";
	$result = mysqli_query($con,$sql);
	$mostrar=(mysqli_fetch_array($result))
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
                        <li class="active">
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
                        <li>
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
                                            <li>Administradores <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Editar</span>
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
                                <li class="active"><a href="#reviews"> Editar Información de la cuenta</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <form name="form1" method="post" action="../admin/modificaruser.php?id=<?php echo $mostrar['ID']?>&tipo=<?php echo $tipo?>&idex=<?php echo $idex?>" onSubmit="return check();">
                                                            <div class="form-group">
                                                                Nombre:
                                                                <input required="" name="name" type="text" id="name" class="form-control" placeholder="Nombre" value="<?php echo $mostrar['Nombre']?>">
                                                                <div id="checkusername" class=""></div>
                                                            </div>
                                                            <div class="form-group">
                                                                Email:
                                                                <input required="" name="email" type="email" id="email" class="form-control" placeholder="Email" value = "<?php echo $mostrar['Correo']?>">
                                                                <div id="checkemailresponse"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                Expediente:
                                                                <input required="" type="text" name="lid" id="lid" class="form-control" placeholder="Expediente" value="<?php echo $mostrar['ID']?>">
                                                                <div id="checkexp" class=""></div>
                                                            </div>

                                                            <center>
                                                                <button type="submit" name="Submit" id="thesubmitBoton" class="btn btn-primary waves-effect waves-light" value="Registrar">Actualizar</button>
                                                            </center>
                                                            </form>
                                                            </br></br></br>
                                                            <form name="form1" method="post" action="../admin/modificarpass.php?id=<?php echo $mostrar['ID'] ?>" onSubmit="return check();">
                                                         <h1 align="center"><span class="style8">Nueva contraseña</span></h1>

                                                            <div class="form-group">
                                                                <input required type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="password" class="form-control" placeholder="Confirmar Contraseña" name="pass2" id="pass2" value="">
                                                            </div>
                                                            <center>
                                                                <button type="submit" name="Submit" id="thesubmitBoton" class="btn btn-primary waves-effect waves-light" value="Registrar">Actualizar</button>
                                                            </center>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <p>Copyright © 2020. Todos los derechos reservados</a></p>
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
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
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