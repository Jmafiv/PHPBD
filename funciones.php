<?php
function cabecera($texto) 
{
    print "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
       \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
  <title>Menú - $texto</title>
  <link href=\"miestilo.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>

<body>
<div id='envoltorio'>
<div id='cabecera'>
		<div id='titulo'>
			$texto
		</div>
	</div>


<div id=\"menu\">
<ul>
   <font size=1>
  <li><a href=\"index.php\">Introducir datos</a></li>
  <li><a href=\"consultar.php\">Consultar</a></li>  </font>
</ul>  



</div>";
}

function pie() 
{
    
echo" <div id='pie'>
<address>
2º D.A.W. 
</address>
</div>
</body>
</html>";
}
