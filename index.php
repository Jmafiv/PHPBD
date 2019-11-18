 <?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n
<h1>Bienvenido a encuesta para desarrolladores</h1>
<p>Indica los lenguajes de programación con los que estás familiarizado</p>
<form action='proceso_insercion.php' method='POST'>
       
                 <table border='0'>
                 <tbody>
                    <tr>
                        <td>Nombre Completo</td>
                        <td><input type='text' name='' value='' /></td>
                    </tr>";
                    $conexion=new mysqli("localhost","root","","ejerClase");
                    $conexion->set_charset("utf8");
                    $sqlPrincipal="";

                    // Aqui va los lenguajes
                    echo "</tbody>
                </table>
              <p>Indica cual es tu afición favorita</p>";
              
               echo " <table border='0'>
                 <tbody>
                    <tr>
                        
<td >Habla:<br> 
(<i>Si habla varios seleccionarlos<br> 
pulsando con el mouse encima de <br> 
cada uno de ellos con la tecla<br> 
<b>Ctrl</b> presionada</i>)</td> 
<td align='left'> <SELECT MULTIPLE name='' SIZE=6>";

	
	// Aqui va los idiomas

echo "</select> 
</td>
                    </tr>
                      <tr>
                        
                        <td colspan='2' align='center'><input type='submit' value='Enviar' /></td>
                    </tr></tbody>
                </table>
        </form>";
       echo "</div>";



pie();
?>

