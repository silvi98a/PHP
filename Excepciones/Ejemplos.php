<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
}                       // lo que sale Error: [2] Undefined variable $test

//set error handler
set_error_handler("customError");

//trigger error
echo($test);
?>