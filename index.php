<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.ico">
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->




<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="nvo/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/owl.carousel.css">
    <link rel="stylesheet" href="nvo/css/owl.theme.css">
    <link rel="stylesheet" href="nvo/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="nvo/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="nvo/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="nvo/js/vendor/modernizr-2.8.3.min.js"></script>


</head>
<body>
	<?php

	include("database.php");
	extract($_POST);

	if(isset($submit))
	{
		//Consultas para verificar los datos ingresados en el login con los de la base de datos.
		//Se busca clase 1 para admin y clase 0 para alumnos.
		//Se busca estado = 1 lo cual significa que el usuario se encuentra activo y aceptado por un admin.
		$sql = "SELECT * FROM usuarios WHERE ID='$loginid' and Password='$pass' and Clase ='1' and Estado = '1'";

		$sql2 = "SELECT * FROM usuarios WHERE ID='$loginid' and  Clase ='0' and Estado = '1' and Password='$pass'" ;



		$rs=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
		$rs2=mysqli_query($con,$sql2);

		$row3 = mysqli_fetch_array($rs3,MYSQLI_ASSOC);
		$row2 = mysqli_fetch_array($rs2,MYSQLI_ASSOC);
		//Contadores que verificarán si los datos ingresados existen de la base de datos.
	    $count = mysqli_num_rows($rs); //
		$count2 = mysqli_num_rows($rs2);

		//Caso donde los dos contadores son 0 y por lo tanto los datos ingresados en el login son incorrectos.
		if($count<1 && $count2 < 1 )
		{
			$found="N";
		}
		else
		{
			//En caso de que el login sea de un alumno
			if ($count < 1 &&  $count2 >= 1){
				$_SESSION[login]=$loginid;

			}
			else{
				//En caso de que el login sea de un administrador
				if ($count >=1){
				    $_SESSION['alogin']="true";
				$_SESSION[alogin]=$loginid;
				}
				else{

				    $found="N";
				}

			}



		}
	}

	if (isset($_SESSION[login]) )
	{
		//Se redirecciona al alumno logeado a su respectiva dirección
	    echo "<script>location.href='nvo/alumno.php';</script>";
	    die();




	}
	if (isset($_SESSION[alogin]) ){
		if(isset($_SESSION['alogin']))
		//Se redirecciona al admin logeado a su respectiva dirección
		echo "<script>location.href='nvo/index.php';</script>";
	    die();
	}
	?>





	<?php
		//Sección correspondiente al formulario del login
	?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="login100-pic js-tilt"  data-tilt>
				<img src="imagenes/unison.png" alt="IMG" width="190" height="190">
			</div>
			<div class="text-center m-b-md custom-login">
				<h3>Por favor ingresa tus datos :)</h3>
				<p>Login necesario para ingresar al portal</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm" name="form1" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Expediente" title="Please enter you username" required=""  name="loginid" id="loginid2" class="form-control">
                                <span class="help-block small">Tu expediente único</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required=""  name="pass" id="pass2" class="form-control">
                                <span class="help-block small">Tu contraseña</span>
							</div>
							<span class="errors">
			       	 			<?php
									if(isset($found))
									{
										echo '<center style="color:#eff502">Usuario o contraseña invalido</center>';
									}
								  ?>
		         			 </span>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks">  Recuérdame </label>
                                <p class="help-block small">(si el dispositivo es privado)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn" name="submit" type="submit" id="submit" >Login</button>
                            <a class="btn btn-default btn-block" href="signup.php">Registrar</a>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2020. Todos los derechos reservados</p>
			</div>
		</div>
    </div>



<!-- jquery
		============================================ -->
		<script src="nvo/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="nvo/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="nvo/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="nvo/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="nvo/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="nvo/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="nvo/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="nvo/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="nvo/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="nvo/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="nvo/js/metisMenu/metisMenu.min.js"></script>
    <script src="nvo/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="nvo/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="nvo/js/icheck/icheck.min.js"></script>
    <script src="nvo/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="nvo/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="nvo//main.js"></script>
    <!-- tawk chat JS
		============================================ -->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>









</body>
</html>