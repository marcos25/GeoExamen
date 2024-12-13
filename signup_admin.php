<!DOCTYPE html>
<html >
  <head>
    <link rel="shortcut icon" href="logo.ico">
    <meta charset="UTF-8">
    <title>Registro</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="nvo//font-awesome.min.css">
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

  <body >


<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->

<!-- Form Module-->

<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
      <a href="index.php"><img src="unison.png" width="170px"/></a>
				<h3>Registro</h3>
				<p>Registrar un nuevo usuario</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm" method="POST" action="signupadmin.php">
                            <div class="row">
                            <div class="form-group col-lg-12">
                                    <label>Nombre</label>
                                    <input required="" class="form-control" pattern="[A-Z a-z ]+" name="name" id="name" type="text" placeholder="Nombre">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Expediente de usuario</label>
                                    <input required="" class="form-control" minlength="9" pattern="[0-9]+" placeholder="Expediente" name="username" id="username">
                                </div>
                                <div id="checkusername" class=""></div>
                                <div class="form-group col-lg-6">
                                    <label>Contraseña</label>
                                    <input required="" type="password" class="form-control" name="pass" id="password"  placeholder="Contraseña">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Repita su contraseña</label>
                                    <input required="" type="password" class="form-control" id='rpassword' name='rpassword' >
                                </div>
                                <div class="" id="divchearsisoniguales"></div>
                                <div class="form-group col-lg-6">
                                    <label>Correo electronico</label>
                                    <input required class="form-control" name="email" id="email" type="email" placeholder="Email">
                                    <div id="checkemailresponse"></div>
                                </div>


                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" type="submit" id="thesubmitBoton">Registrar</button>

                            </div>
                            </form>
                            <button class="btn btn-default" onclick="location='index.php'">Cancelar</button>


                            </div>




                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2020. Todos los derechos reservados</p>
			</div>
		</div>
    </div>



    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script>

        $(document).ready(function () {
   $("#rpassword").keyup(checkPasswordMatch);

});

   $(document).ready(function () {
   $("#password").keyup(checkPasswordMatch2);

});




 function checkPasswordMatch2() {
 var repeatPass= document.getElementById('rpassword').value;
var repeatclave = repeatPass.length;
 if (repeatclave>0)
 {
    var password = $("#password").val();
    var confirmarPassword = $("#rpassword").val();

    if (password != confirmarPassword){
        $("#divchearsisoniguales").html("<div class='alert alert-danger'><i class='fa fa-close'></i>  Las contraseñas NO coinciden!<input value='error' type='hidden' name='passwordchecker'></div>");
   document.getElementById("thesubmitBoton").disabled = true;
} else{

        $("#divchearsisoniguales").html("<div class='alert alert-success'><i class='fa fa-check'></i> Las contraseñas coinciden.<input type='hidden'  value='1' name='passwordchecker'></div>");
        document.getElementById("thesubmitBoton").disabled = false;
    }
    }
}

    </script>
  <script>



 function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmarPassword = $("#rpassword").val();

    if (password != confirmarPassword){
        var contador=0;
        $("#divchearsisoniguales").html("<i class='fa fa-close'></i>  Las contraseñas NO coinciden!<input value='error' type='hidden' name='passwordchecker'>");
   document.getElementById("thesubmitBoton").disabled = true;
} else{
    contador=1;
        $("#divchearsisoniguales").html("<i class='fa fa-check'></i> Las contraseñas coinciden.<input type='hidden'  value='1' name='passwordchecker'>");
        document.getElementById("thesubmitBoton").disabled = false;
    }

}


    </script>
    <script>


      $(document).ready(function () {
   $("#username").keyup(checarUsuarios);
});


     $(document).ready(function () {
   $("#username").change(checarUsuarios);
});

     $(document).ready(function () {
   $("#email").keyup(checarEmails);
});


     $(document).ready(function () {
   $("#email").change(checarEmails);
});
function checarUsuarios() {

var username= document.getElementById('username').value;
var userlenght = username.length;
if (userlenght<9)
{
  document.getElementById("checkusername").innerHTML="<i class='fa fa-close'></i> Nombre de usuario por lo menos de 9 caracteres <input id='usernamechecker' type='hidden' value='0' name='usernamechecker'> ";

}
else {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
document.getElementById("checkusername").innerHTML = xhttp.responseText;
usernameresponsed = document.getElementById('usernamechecker').value;



if (usernameresponsed=="1")
{

   if (emailresponsed)
   {
      emailresponsed=document.getElementById('emailchecker').value;
      if (emailresponsed=="1"){
          document.getElementById("thesubmitBoton").disabled = false;
                    }
   }
}


else if (usernameresponsed=="0")
{
    document.getElementById("thesubmitBoton").disabled = true;
}
}
};
xhttp.open("POST", "checarusername.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("username="+username+"");

}
}
function checarEmails() {

var email= document.getElementById('email').value;



var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4 && xhttp.status == 200) {
document.getElementById("checkemailresponse").innerHTML = xhttp.responseText;
emailresponsed = document.getElementById('emailchecker').value;
if (emailresponsed=="1")
{

   if (usernameresponsed)
   {
      usernameresponsed=document.getElementById('usernamechecker').value;
      if (usernameresponsed=="1"){
          document.getElementById("thesubmitBoton").disabled = false;
                    }
   }
}
else if (emailresponsed=="0")
{
    document.getElementById("thesubmitBoton").disabled = true;
}
}
};
xhttp.open("POST", "checkemail.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("email="+email+"");


}

</script>
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
    <script src="nvo/js/main.js"></script>
    <!-- tawk chat JS


  </body>
</html>
