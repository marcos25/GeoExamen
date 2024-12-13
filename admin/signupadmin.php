<!DOCTYPE html>
<html >
  <head>
    <link rel="shortcut icon" href="logo.ico">
    <meta charset="UTF-8">
<title>Registro</title>



<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/responsive.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style-form.css">
    <link rel="stylesheet" href="css/fondo.css">
  </head>

  <body >


<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->

<!-- Form Module-->

<center>
    <a href="index.php"><img src="unison.png" width="170px"/></a>
</center>

  <div  class="module form-module">

      <center><div class=" "><i class="fa fa-times fa-pencil"></i>  Registrarme

          </div></center>


  <div class="form">
    <h2>Crear una cuenta</h2>
    <form method="POST" action="signupuser.php">
      <input required="" pattern="[A-Z a-z ]+" name="name" id="name" type="text" placeholder="Nombre"/>
        <input minlength="9" pattern="[0-9]+" required="" type="text" placeholder="Expediente" name="username" id="username"/>
   <div id="checkusername" class=""></div>
   <input required="" name="pass" id="password" type="password" placeholder="Contraseña"/>
   <input required placeholder="Repetir Contraseña" required="" id='rpassword' name='rpassword' type='password' >
   <div class="" id="divchearsisoniguales"></div>
   <input required="" name="email" id="email" type="email" placeholder="Email"/>
      <div id="checkemailresponse"></div>
      <button type="submit" id="thesubmitBoton">Registrarme</button>
    </form>
  </div>
  <div class="cta"></div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

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


  </body>
</html>
