<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n";
extract ($_POST);

// Conexion
$conexion=new mysqli("localhost","root","","ejerClase");
$conexion->set_charset("utf8");

// Cojo los datos de los usuarios
$sqlPrincipal="select num_orden,nombre from encuesta";
$resultPrincipal=$conexion->query($sqlPrincipal);
 	$sEntra=false;
echo "<h3>Lenguaje: ".((isset($progLeng)) ? $progLeng:"Todos").", Idioma: ".((isset($idioma)) ? $idioma:"Todos")."</h3>";

$cabecera="<table border='1'><tr><th>Nombre</th><th>Lenguajes</th><th>Idiomas</th>";
// Por cada usuario
while ($fila=$resultPrincipal->fetch_assoc())
	{
	extract($fila);
	$datosEncuestado="<tr><td>".$nombre."</td><td>";
	
	$sqlLenguajes="SELECT nombre from lenguajes where id_lenguaje in (SELECT id_lenguaje from programa where num_orden = $num_orden)";
	$resultLenguajes=$conexion->query($sqlLenguajes);
	
	$sqlIdiomas="SELECT nombre from idiomas where id_idioma in (SELECT id_idioma from habla where num_orden = $num_orden)";
	$resultIdiomas=$conexion->query($sqlIdiomas);
	$estaLenguaje=false;
	$estaIdioma=false;
	$datosLenguaje="";
	$datosIdioma="";

	// Comprobar lenguaje de Programación
	if(!isset($progLeng)){
		$estaLenguaje=true;
	}
	while ($filaLenguajes=$resultLenguajes->fetch_assoc())
	{
		$datosLenguaje.=$filaLenguajes["nombre"]."<br>";
		
		if (isset($progLeng))
		{
			if ($filaLenguajes["nombre"]==$progLeng)
		       {$estaLenguaje=true;}
		}
		else
		{
			$estaLenguaje=true;
		}
	}
	


	//comprobar idiomas
	if(!isset($idioma)){
		$estaIdioma=true;
	}
	while ($filaIdiomas=$resultIdiomas->fetch_assoc())
	{
		$datosIdioma.=$filaIdiomas["nombre"]."<br>";
		
		 if (isset($idioma))
		 {
		 	if ($filaIdiomas["nombre"]==$idioma)
		        {$estaIdioma=true;}
		 }
		 else
		 {
		$estaIdioma=true;
		}
	}
	

	if ($estaLenguaje&&$estaIdioma)
	{
		if (!$sEntra){
			echo $cabecera;
			$sEntra=true;
		}
		echo $datosEncuestado.$datosLenguaje."</td><td>".$datosIdioma."</td></tr>";
	}
		
}	
	if ($sEntra){
		echo "</table>";
	}
	else{
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
