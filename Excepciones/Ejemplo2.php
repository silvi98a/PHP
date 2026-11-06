<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
  if ($errno==2) echo " El campo xxx está vacío";
  
}                       // lo que sale Error: [2] Undefined variable $test

//set error handler
set_error_handler("customError");

//trigger error
$campo = 2;
if ($campo>=1) {
    trigger_error(" Valor debe ser superior o igual a 1"); //yo lo disparo con trigger error
}
echo($test);
?>