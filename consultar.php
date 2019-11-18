<?php
include('funciones.php');
cabecera('Examen PHP');
echo "<div id=\"contenido\">\n
<h1>Consulta</h1>
<form action='proceso_consulta.php' method='POST'>
<table border='0'  cellpadding='10'>
<tbody>
<tr><th colspan='2'>Lenguaje de programación :</th><th colspan='2'>Idioma</th></tr>
<tr><td>Java</td><td><input type='radio' name='progLeng' value='Java' /></td><td>Inglés</td><td><input type='radio' name='idioma' value='Inglés' /></td>
</tr><tr><td>PHP</td><td><input type='radio' name='progLeng' value='PHP' /></td> <td>Francés</td><td><input type='radio' name='idioma' value='Francés' /></td>
</tr><tr><td>Ruby</td><td><input type='radio' name='progLeng' value='.NET' /></td><td>Alemán</td><td><input type='radio' name='idioma'  value='Alemán' /></td>
</tr><tr><td>Python</td><td><input type='radio' name='progLeng' value='Python' /></td><td>Ruso</td> <td><input type='radio' name='idioma'  value='Ruso' /></td>
                    </tr><tr><td colspan='2' align='center'><input type='submit' name='envio' value='Enviar' /></td> <td>Chino</td><td><input type='radio' name='idioma'  value='Chino' /></td></tr>
                   
                </tbody>
                </table></form>";

echo "</div>";
pie();
?>
