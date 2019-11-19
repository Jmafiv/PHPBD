<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n";
extract ($_POST);

// Conexion
$conexion=new mysqli("localhost","root","","ejerClase");
$conexion->set_charset("utf8");

// Coge los datos de los usuarios
$sqlPrincipal="select num_orden,nombre from encuesta";
$resultPrincipal=$conexion->query($sqlPrincipal);
 	$sEntra=false;
echo "<h3>Lenguaje: ".((isset($progLeng)) ? $progLeng:"Todos").", Idioma: ".((isset($idioma)) ? $idioma:"Todos")."</h3>";

$cabecera="<table border='1'><tr><th>Nombre</th><th>Lenguajes</th><th>Idiomas</th>";


// De los datos consultados, devuelve si cumple:
function comprueba($datos,$elegido){
		$bool = false;
		$resultado = "";
		if($elegido==""){$bool=true;} // Se ha elegidos todos
		while ($fila=$datos->fetch_assoc())
		{
			$resultado.=$fila["nombre"]."<br>";
			if (isset($elegido) && $fila["nombre"]==$elegido){$bool=true;} // Tiene el que se pide
		}
		return [$bool,$resultado]; // Devuelve si tiene el lenguaje/idioma seleccionado y sus lenguajes/idiomas.
}

// Por cada usuario
while ($fila=$resultPrincipal->fetch_assoc()){
	extract($fila);
	$datosEncuestado="<tr><td>".$nombre."</td><td>";
	
	$sqlLenguajes="SELECT nombre from lenguajes where id_lenguaje in (SELECT id_lenguaje from programa where num_orden = $num_orden)";
	$resultLenguajes=$conexion->query($sqlLenguajes);
	
	$sqlIdiomas="SELECT nombre from idiomas where id_idioma in (SELECT id_idioma from habla where num_orden = $num_orden)";
	$resultIdiomas=$conexion->query($sqlIdiomas);

	// Coge sus lenguajes y dime si tiene el que se pide:
	$leng = comprueba($resultLenguajes,isset($progLeng)?$progLeng:"");
	$estaLenguaje=$leng[0]; // ¿Tiene el que se pide? (true/false)
	$datosLenguaje=$leng[1]; // Lenguajes del usuario

	// Coge sus idiomas y dime si tiene el que se pide:
	$idiom = comprueba($resultIdiomas,isset($idioma)?$idioma:"");
	$estaIdioma=$idiom[0];  // ¿Tiene el que se pide? (true/false)
	$datosIdioma=$idiom[1]; // Idiomas del usuario

	// Muestralos
	if ($estaLenguaje&&$estaIdioma){
		if (!$sEntra){echo $cabecera;$sEntra=true;}
		echo $datosEncuestado.$datosLenguaje."</td><td>".$datosIdioma."</td></tr>";
	}
		
}	
	if ($sEntra){
		echo "</table>";
	}
	else{ // Validaciones 
		if(isset($idioma)&&isset($progLeng)){
			echo "Ningún candidato conoce $progLeng ni habla $idioma";
		}
		else if(!isset($idioma)&&isset($progLeng)){
			echo "Ningún candidato conoce $progLeng";
		}
		else if(isset($idioma)&&!isset($progLeng)){
				echo "Ningún candidato habla $idioma";
		}
	}
	
echo "</div>";
pie();
?>
