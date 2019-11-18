<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n";
extract ($_POST);
$conexion=new mysqli("localhost","root","","ejercicio7");
$conexion->set_charset("utf8");
$sqlPrincipal="select encuesta.num_orden,encuesta.nombre,aficiones.descripcion "
    . "from encuesta inner join aficiones "
    . "on encuesta.cod_aficion=aficiones.codigo";
$sEntra=false;
$resultPrincipal=$conexion->query($sqlPrincipal);
echo "<h3>Lenguaje: ".((isset($progLeng)) ? $progLeng:"Todos").", Idioma: ".((isset($idioma)) ? $idioma:"Todos")."</h3>";
$cabecera="<table border='1'><tr><th>Nombre</th><th>Afición</th><th>Lenguajes</th><th>Idiomas</th>";
while ($fila=$resultPrincipal->fetch_assoc())
	{
	extract($fila);
	$datosEncuestado="<tr><td>".$nombre."</td><td>".$descripcion."</td><td>";
	$sqlLenguajes="SELECT lenguaje from lenguajesencuesta WHERE num_orden=$num_orden";
	$resultLenguajes=$conexion->query($sqlLenguajes);
	$sqlIdiomas="SELECT idioma from idiomasencuesta WHERE num_orden=$num_orden";
	$resultIdiomas=$conexion->query($sqlIdiomas);
	$estaLenguaje=false;
	$estaIdioma=false;
	$datosLenguaje="";
	$datosIdioma="";
	//comprobar lenguaje de Programación
	while ($filaLenguajes=$resultLenguajes->fetch_assoc())
	{
		$datosLenguaje.=$filaLenguajes["lenguaje"]."<br>";
		
		if (isset($progLeng))
		{
			if ($filaLenguajes["lenguaje"]==$progLeng)
		       {$estaLenguaje=true;}
		}
		else
		{
		$estaLenguaje=true;
		}
	}
	
	//comprobar idiomas
	while ($filaIdiomas=$resultIdiomas->fetch_assoc())
	{
		$datosIdioma.=$filaIdiomas["idioma"]."<br>";
		
		if (isset($idioma))
		{
			if ($filaIdiomas["idioma"]==$idioma)
		       {$estaIdioma=true;}
		}
		else
		{
		$estaIdioma=true;
		}
	}
	if ($estaLenguaje&&$estaIdioma)
	{
		if (!$sEntra)
			{echo $cabecera;
			$sEntra=true;}
		echo $datosEncuestado.$datosLenguaje."</td><td>".$datosIdioma."</td></tr>";
	}
		
}
	
	
	if ($sEntra)
		echo "</table>";
	else
		echo "Ningún candidato conoce $progLeng ni Habla $idioma";
	
echo "</div>";
pie();
?>
