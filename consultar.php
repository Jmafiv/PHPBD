<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n
<h1>Consulta</h1>
<form action='proceso_consulta.php' method='POST'>";

echo "<br><table><tr><th>Lenguaje de programación</th><th>Idiomas</th></tr>";
// Tabla Lenguajes
echo "<tr><td valign='top'><table border='0' cellpadding='10'>";

//Conexión a la base de datos
$conexion=new mysqli("localhost","root","","ejerClase");
$conexion->set_charset("utf8");
//Hacemos la Select SQL
$sqlPrincipal="SELECT nombre from lenguajes";
//En esta conexion hazme esta consulta:
$resultPrincipal=$conexion->query($sqlPrincipal);
//Metemos en un array los resultados
while ($fila=$resultPrincipal->fetch_assoc())
{
	extract($fila);
	echo "<tr><td>$nombre</td><td><input type='radio' name='progLeng' value='$nombre'/></td></tr>";
}
echo "</table></td>";


//Tabla Idiomas
echo "<td valign='top'><table border='0' cellpadding='10'>";
//Hacemos la Select SQL
$sqlPrincipal="SELECT nombre from idiomas";
//En esta conexion hazme esta consulta:
$resultPrincipal=$conexion->query($sqlPrincipal);
//Metemos en un array los resultados
while ($fila=$resultPrincipal->fetch_assoc())
{
	extract($fila);
	echo "<tr><td>$nombre</td><td><input type='radio' name='idioma' value='$nombre'/></td></tr>";
}
echo "</table></td></tr></table>";    
                
echo "<br><input type='submit' name='envio' value='Enviar' /></form>";

echo "</div>";
pie();
?>
