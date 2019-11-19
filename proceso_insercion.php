<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n";
//echo "<h2>Aquí los Inserts</h2>";
extract ($_POST);
$conexion=mysqli_connect ("localhost","root","","ejerClase");

// Inserta el usuario
$sql="INSERT INTO encuesta(nombre) VALUES ('$nombre')";
mysqli_query($conexion,$sql);
if (mysqli_errno($conexion)==0){
	echo "Se ha añadido el usuario correctamente.<br>";
	
	// Busca su número (que es automatico)
	$num=mysqli_fetch_array($conexion->query("select last_insert_id() as num_ord from encuesta"));
	$norden = $num["num_ord"];

	// Si hay lenguajes
	if(isset($lenguajes)){
		// Para cada lenguaje señalado
		foreach ($lenguajes as $i => $leng) {
			// Inserta los lenguajes en la tabla programa
			$sql="INSERT INTO programa VALUES ('$norden','$leng')";
			mysqli_query($conexion,$sql);
			if (mysqli_errno($conexion)!=0){echo "Error al introducir los lenguajes<br>";}
		}
	}

	// Si hay idiomas
	if(isset($idiomas)){
		// Para cada idioma señalado
		foreach ($idiomas as $i => $idiom) {
			// Inserta los idiomas en la tabla habla
			$sql="INSERT INTO habla VALUES ('$norden','$idiom')";
			mysqli_query($conexion,$sql);
			if (mysqli_errno($conexion)!=0){echo "Error al introducir los idiomas<br>";}
		}
	}
}
else{ echo "Ha ocurrido un error.";}

echo "</div>";
pie();
?>
