<HTML>
<HEAD><TITLE> EJ3 Strings - Analizador de correo electrónico </TITLE></HEAD>
<BODY>
<?php
 $email = "alberto.garcia@educa.madrid.org";

 $arroba = strpos($email, "@"); //busca la posición del @, en este caso es la 14.
 $usuario = substr($email, 0, $arroba); //coge todo lo que hay ANTES del @
 $dominio = substr($email, $arroba + 1); //coge lo que hay DESPUÉS del @
 
 $organizacion = explode(".", $dominio); //en el anterior separaba por espacios, aquí por .
 $educa = $organizacion[0];             //y en $dominio tengo SOLO eduda.madrid.org
 $madrid = $organizacion[1];
 $org = $organizacion[2];

 $caracUsu = strlen($usuario);
 $caracDom = strlen($dominio);

print("Email: " . $email . "<br>");
print("<br>");
print("Usuario: " . $usuario . "<br>");
print("Dominio: " . $dominio . "<br>");
print("Organización: " . $educa . "<br>");
print("Extensión: " . $org . "<br>");
print("<br>");
print("El usuario contiene " . $caracUsu . " caracteres. <br>" );
print("El dominio contiene " . $caracDom . " caracteres.  ");  


?>
</BODY>
</HTML>