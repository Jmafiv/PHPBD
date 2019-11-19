<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n";
//echo "<h2>Aquí los Inserts</h2>";
extract ($_POST);
$conexion=mysqli_connect ("localhost","root","","ejerClase");
$sql="INSERT INTO encuesta(nombre) VALUES ('$nombre')";
mysqli_query($conexion,$sql);
if (mysqli_errno($conexion)==0){
	echo "Se ha añadido el usuario correctamente.<br>";
	$num=mysqli_fetch_array($conexion->query("SELECT max(num_orden) as num_ord from encuesta"));
	$norden = $num["num_ord"];
	if(isset($lenguajes)){
		foreach ($lenguajes as $i => $leng) {
			$sql="INSERT INTO programa VALUES ('$norden','$leng')";
			mysqli_query($conexion,$sql);
			if (mysqli_errno($conexion)==0){echo "Lenguaje introducido<br>";}
			else{echo "Error al introducir los lenguajes<br>";}
		}
	}
	if(isset($idiomas)){
		foreach ($idiomas as $i => $idiom) {
			$sql="INSERT INTO habla VALUES ('$norden','$idiom')";
			mysqli_query($conexion,$sql);
			if (mysqli_errno($conexion)==0){echo "Idioma introducido<br>";}
			else{echo "Error al introducir los idiomas<br>";}
		}
	}
}
else{ echo "Ha ocurrido un error.";}

echo "</div>";
pie();
?>
