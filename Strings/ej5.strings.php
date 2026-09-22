<HTML>
<HEAD><TITLE> EJ5 Strings - Procesamiento de una URL </TITLE></HEAD>
<BODY>
<?php
 $url = "https://www.tienda.es/productos/portatil.php?id=34&marca=lenovo";

 $posProtocolo = strpos($url, "://"); //busca por donde empieza el :// en la posición 5. Guarda la pos 5.
 $protocolo = substr($url, 0, $posProtocolo); //dice -> empieza en la pos 0 y coge 5 caracteres del texto anterior.
                                            // esto coge https
 $resto = substr($url, $posProtocolo + 3); // www.tienda.es/productos/portatil.php?id=34&marca=lenovo

 $posBarra = strpos($resto, "/"); //busco la barra (posición 13)
 $dominio = substr($resto, 0, $posBarra); // www.tienda.es

 $restoRuta = substr($resto, $posBarra); // coge el resto desde la barra /productos/portatil.php?id=34&marca=lenovo
                                         // al no pasarle tres parámetros, coge todo lo restante hasta el final
 
 $posInterrogacion = strpos($restoRuta, "?"); //busca el signo de interrogación
 $ruta = substr($restoRuta, 0, $posInterrogacion); // /productos/portatil.php
 $parametros = substr($restoRuta, $posInterrogacion + 1); // id=34&marca=lenovo
 //$posInterrogacion es la posición del propio ?, como no quiero meterlo en el resultado,
 //se suma 1, y coge después de la ?

 $partesRuta = explode("/", $ruta); // ["", "productos", "portatil.php"]  separa por trozos la ruta
 $fichero = end($partesRuta); // portatil.php


 //para la salida2
 $listaParametros = explode("&", $parametros);   // ["id=34", "marca=lenovo"]
 $par1 = explode("=", $listaParametros[0]);  // ["id", "34"]
 $par2 = explode("=", $listaParametros[1]);  // ["marca", "lenovo"]
 //se separan por el =

 $idProducto = $par1[1];
 $marca = $par2[1];

 // salida1
 echo "<b>Salida1:</b><br><br>";
 echo "Protocolo: " . $protocolo . "<br>";
 echo "Dominio: " . $dominio . "<br>";
 echo "Ruta: " . $ruta . "<br>";
 echo "Fichero: " . $fichero . "<br>";
 echo "Parámetros: " . $parametros . "<br><br><br>";


 echo "<b>Salida2:</b><br><br>";
 echo "Protocolo: " . $protocolo . "<br>";
 echo "Dominio: " . $dominio . "<br>";
 echo "Ruta: " . $ruta . "<br>";
 echo "Fichero: " . $fichero . "<br>";
 echo "Id producto=" . $idProducto . "<br>";
 echo "Marca=" . $marca . "<br>";

?>
</BODY>
</HTML>
