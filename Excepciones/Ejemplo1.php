<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
  if ($errno==2) echo " El campo xxx está vacío";
  
}                       // lo que sale Error: [2] Undefined variable $test

//set error handler
set_error_handler("customError");

//el error se dispara solo porque la variable no está definida.
echo($test);
?>