<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<title>Examen Ceneval</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php
	extract($_GET);
	$n = $_REQUEST['n'];

include("database.php");

$user = $_SESSION[login];
if ($n==0){
    $_SESSION["correctas"]=0;
}
$contador = 0;
//Consultamos las relaciones entre los reactivos y el examen correspondiente.
$query0 = "SELECT * FROM reactivosExamen WHERE IDExamen = $subid";
//Buscamos el examen.
$query2 = "SELECT * FROM examen WHERE IDExamen = $subid";
//Consultamos la inscripción del alumno.
$sql = "SELECT * From inscripcion WHERE IDAlumno='$user' and IDExamen = '$subid'";
$result = mysqli_query($con,$sql);
$result0 = mysqli_query($con,$query0);
$result2 = mysqli_query($con,$query2);
$contador2 = 0;
mysqli_data_seek($result2,0);
$Fecha_limite = mysqli_fetch_row($result2);
$npreg = $Fecha_limite[2];
?>
<span style="font-size:20px">Tiempo restante:</span>
 <span  id="demo" style="font-size:20px"></span>
<script language="JavaScript">
// function to calculate local time
// in a different city
// given the city's UTC offset
function calcTime(city, offset) {
    // create Date object for current location
    d = new Date();

    // convert to msec
    // add local time zone offset
    // get UTC time in msec
    utc = d.getTime() + (d.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    nd = new Date(utc + (3600000*offset));

    // return time as a string
    return nd;
}
// get Singapore time
//alert(calcTime('Singapore', '+8'));
// get London time
//alert(calcTime('London', '+1'));
</script>
<script>
//confirm("¿Esta seguro que desea rechazar esta solicitud?");
// Set the date we're counting down to
var countDownDate =<?php echo "new  Date( '$Fecha_limite[5] $Fecha_limite[7]' )"?>;
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  //var now = new Date().getTime();
  var now = calcTime('Hermosillo', '-7').getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById('daletiempo').click();
  }
}, 1000);
</script>
<?php

	while($mostrar=(mysqli_fetch_array($result))){


    $contador2 = $contador2 + 1;


	}
	/*
	if ($contador2 >= 1 && $contestado != 1 ){
	    echo "ya realizo este examen, solo se puede realizar una vez.....";
	    echo "<br><div class=head1><a href=result.php?id=$user&idex=$subid>Ver resultados</a></div>";
	    exit;
	}
	*/

	date_default_timezone_set('America/Hermosillo');

	while($mostrar2=(mysqli_fetch_array($result2))){
		$date = date("H:i:s");
		$dateEx = $mostrar2['HInicio'];
		$nameex = $mostrar2['NombreExamen'];
		$nameex = $mostrar2['Lugar'];
		$dateEx2 = $mostrar2['HFinal'];

		//Comprueba el que examen ya haya iniciado comparando fechas
		if ($dateEx > $date || $dateEx2 < $date ){
		    echo "aun no inicia este examen.... </br>";
		    echo "Son las: $date </br>";
		    echo "El examen inicia a las: $dateEx </br>";
		    exit;
		}

	}
	echo "</br></br>";


?>

      <?php
	$contador = 0;

	while( $mostrar1=(mysqli_fetch_array($result0))){

		$idex = $mostrar1['IDReactivo'];
		$query = "SELECT * FROM reactivos WHERE IDReactivo = $idex";
		$preguntas=mysqli_query($con,$query) or die(mysqli_error());
			mysqli_data_seek($preguntas,$contador);
		$Q_1= mysqli_fetch_row($preguntas);
		$arraypreg[1][$contador]=$Q_1[1];
		$rc[$contador] = $Q_1[2];

		$query = "SELECT * FROM incisos WHERE IDReactivo = $Q_1[0] ";
		$resp1=mysqli_query($con,$query) or die(mysqli_error());
			mysqli_data_seek($resp1,0);
		$R1_1= mysqli_fetch_row($resp1);
		$resp[0][$contador]=$R1_1[1];

		$resp11[0][$contador]=$R1_1[0];
			mysqli_data_seek($resp1,1);
		$R1_2= mysqli_fetch_row($resp1);
		$resp[1][$contador]=$R1_2[1];

		$resp11[1][$contador]=$R1_2[0];

		$R1_3= mysqli_fetch_row($resp1);
		$resp[2][$contador]=$R1_3[1];
		$resp11[2][$contador]=$R1_3[0];

		$R1_4= mysqli_fetch_row($resp1);
		$resp[3][$contador]=$R1_4[1];
		$resp11[3][$contador]=$R1_4[0];

		$ans[0][0] = 1;
		$contador++;
}

if ($n<$npreg){
?>
	<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong>
                            <h3 class="panel-title">
                            <?php echo $n+1 ?>.-
                            <?php
                                //Imprime la pregunta
                                echo $arraypreg[1][$n];
                            ?>
                            </h3>
                        </strong>
                    </div>
                    <form method="post" action="">
	                    <div class="panel-body two-col">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="well well-sm">
	                                    <div class="checkbox">
	                                        <label>
	                                            <input  type="radio" name="ans1" value="1">
	                                            <?php
	                                                //imprime el primer inciso del reactivo
	                                                echo $resp[0][$n]
	                                            ?>
	                                        </label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="well well-sm">
	                                    <div class="checkbox">
	                                        <label>
	                                            <input  type="radio" name="ans1" value="2">
	                                            <?php
	                                                echo $resp[1][$n]
	                                            ?>
	                                        </label>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="well well-sm margin-bottom-none">
	                                    <div class="checkbox">
	                                        <label>
	                                            <input type="radio" name="ans1" value="3">
	                                            <?php
	                                                echo $resp[2][$n]
	                                            ?>
	                                        </label>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="well well-sm margin-bottom-none">
	                                    <div class="checkbox">
	                                        <label>
	                                            <input type="radio" name="ans1" value="4">
	                                            <?php
	                                                echo $resp[3][$n]
	                                            ?>
	                                        </label>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                    	</div>
	                    <div class="panel-footer">
							
							<input type="submit" class="btn btn-success btn-sm" id="submit" name="submit" value="Siguiente" onclick="">
	                        <input type=submit id=daletiempo name=submit2 style="display: none;" onclick="alert('Se termino el tiempo.')">
	                    </div>
	                </form>
                </div>
            </div>
        </div>
    </div>

<?php
}



$contador = 0;
$correctas = 0;
$resp = $_POST['ans1'];


$cont =1;

//Comprobamos que si la respuesta fue correcta cada vez que  el alumno conteste una pregunta.
if (isset($_POST['submit']) || isset($_POST['submit2'])) {
		$cont = 0;
		
    	//Si la respuesta fue a
    	if($resp==1){
			//Se verifica si el inciso elegido es el correcto.
		    if ($resp11[0][$n] == $rc[$n] ){

		          $_SESSION["correctas"]= $_SESSION["correctas"]+1;
				  $bool[$n] = 1;
		    }

		}
		//Si la respuesta fue b
		if($resp==2){

		    if ($resp11[1][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;
				$bool[$n] = 1;

		    }

    	}

		//Si la respuesta fue c
		if($resp==3){

		    if ($resp11[2][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;
				$bool[$n] = 1;

		    }

		}
		//Si la respuesta fue d
		if($resp==4){

		    if ($resp11[3][$n] == $rc[$n] ){

		        $_SESSION["correctas"]= $_SESSION["correctas"]+1;
				$bool[$n] = 1;

		    }

    	}



	else{

	}
if ($n<$npreg){
	//Si el examen aún no ha terminado se incrementa n en 1, el cual representa el núm. de reactivo.
	$n++;
}


echo "<script language=Javascript> location.href=\"quiz2.php?subid=$subid&n=$n\"; </script>";



}
//Se revisa si se terminaron las preguntas.
if ($n==$npreg)
{
     $_SESSION["terminado"]= $_SESSION["terminado"]+1;

}

//Se revisa si se terminó el examen.
if ($n==$npreg &&  $_SESSION["terminado"]==2) {
    $resp1 = $_POST['ans1'];

    $contestado=1;
	$correctas = $_SESSION["correctas"];
//Se insertan los datos correspondientes a los resultados.
$query="insert into resultados(IDAlumno,IDExamen,NombreExamen,Lugar,AdminID,Fecha,IDRespuestas,RespCorrectas,nReactivos)values ('$user','$subid','$Fecha_limite[1]','$Fecha_limite[4]','$cont','$Fecha_limite[5]','$resp','$correctas','$npreg')";

$rs=mysqli_query($con,$query) or die(mysqli_error());

echo "<script language=Javascript> location.href=\"nvo/resultados-examenes.php?id=$user&idex=$subid\"; </script>";

exit;
}


?>

</body>
</html>
