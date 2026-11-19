<?php
function customError($errno, $errstr) { //función de errores
  echo "<b>Error:</b> $errstr";
  exit; // para el programa, sino, sigue repartiendo las cartas.
}


function funcion_limpiar($data) { // Evitar inyección de código
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function crearJugadores($datos) { //array con los 4 jugadores a partir de los datos del formulario
    $jugadores = []; // array vacío donde guardaré los nombres

    for ($i = 1; $i <= 4; $i++) { // repito 4 veces, una por jugador (1, 2, 3 y 4)
        $nombre = funcion_limpiar($datos["jugador" . $i]); // Limpiar el nombre que viene del formulario ("jugador" + 1 = "jugador1", etc.)

        if ($nombre == "") {// Si está vacío, lanzo trigger_error
            trigger_error("El jugador $i no tiene nombre"); // salta customError y muestra el mensaje
        }

        $jugadores[] = $nombre; // añado el nombre al final del array
    }

    return $jugadores; // devuelvo el array con los 4 nombres
}


function puntosCarta($valor) {// devuelvo los puntos de una carta según su valor
    if ($valor == "J" || $valor == "Q" || $valor == "K") { // si es figura (J, Q o K)
        return 0.5; // vale 0.5
    }
    if ($valor == "1") { // si es el as
        return 1; //vale 1
    }
    return (int) $valor; //el resto vale su número (convierto el texto "7" en el número 7)
}


function crearBaraja() { // creo la baraja de 40 cartas (4 tipos x 10 valores)
    $tipos = ["C", "D", "P", "T"]; // los 4 tipos: corazones, diamantes, picas y tréboles
    $valores = ["1", "2", "3", "4", "5", "6", "7", "J", "Q", "K"]; // los 10 valores de cada tipo
    $baraja = []; // baraja vacía donde iré guardando las cartas

    foreach ($tipos as $tipo) { // recorro cada tipo
        foreach ($valores as $valor) { // y para cada tipo, recorro cada valor
            $baraja[] = ["valor" => $valor, "tipo" => $tipo, "puntos" => puntosCarta($valor)]; // esto sería ["valor" => "K", "tipo" => "P", "puntos" => 0.5]
        }
    }
    shuffle($baraja); //mezclo la baraja
    return $baraja; // devuelvo la baraja con las 40 cartas mezcladas
}


function validarCartas($numCartas) { // compruebo que el número de cartas esté entre 1 y 10
    if ($numCartas < 1 || $numCartas > 10) { // si es menor que 1 o mayor que 10
        trigger_error("El número de cartas debe estar entre 1 y 10", E_USER_ERROR); // lanzo el error y el programa se para
    }
}


function repartirCartas($jugadores, $baraja, $numCartas) { //reparto las cartas a cada jugador

    validarCartas($numCartas); // compruebo que el número de cartas es correcto antes de repartir
    $manos = []; // array donde guardaré la mano de cada jugador

    foreach ($jugadores as $i => $nombre) { //recorro los jugadores ($i es su posición: 0, 1, 2, 3)
        $manos[$i] = array_splice($baraja, 0, $numCartas); //saco las primeras cartas de la baraja y se las doy al jugador
    }
    //splice lo que hace es sacar cartas de $baraja, 0 desde donde empieza la primera y $numcartas cuántas cartas se cogerá.
    //las devuelve y las elimina de la baraja
    return $manos; // devuelvo las manos de todos los jugadores
}


function calcularPuntuaciones($manos) { // calculo la puntuación de cada jugador
    $puntuaciones = []; // array unevo donde se guardarán los puntos de cada jugador

    foreach ($manos as $i => $mano) { //recorro la mano de cada jugador
        $total = 0; //empiezo en 0 puntos

        foreach ($mano as $carta) { //recorro las cartas de esa mano
            $total = $total + $carta["puntos"]; //sumo los puntos de cada carta
        }

        $puntuaciones[$i] = $total; // guardo el total en la posición del jugador
    }

    return $puntuaciones; // devuelvo los puntos de todos los jugadores
}


function obtenerGanadores($puntuaciones) {// devuelvo las posiciones de los ganadores
    $mejor = 0; // mejor puntuación sin pasarse de 7.5
    $ganadores = []; // posiciones de los ganadores

    foreach ($puntuaciones as $puntos) { //busco la mejor puntuación
        if ($puntos <= 7.5 && $puntos > $mejor) { //si no se pasa y mejora la mejor
            $mejor = $puntos; // es la nueva mejor
        }
    }

    foreach ($puntuaciones as $i => $puntos) { //busco quién tiene la mejor
        if ($mejor > 0 && $puntos == $mejor) { // si hay mejor y coincide (así se cubren los empates)
            $ganadores[] = $i; // guardo su posición
        }
    }

    return $ganadores; //si todos se pasan, devuelve un array vacío
}


function calcularPremios($puntuaciones, $ganadores, $apuesta) { // calculo el premio de cada jugador
    $premios = []; // array donde guardaré el premio de cada jugador

    foreach ($puntuaciones as $i => $puntos) { // todos empiezan sin premio
        $premios[$i] = 0;
    }

    if (count($ganadores) > 0) { // solo si hay ganadores
        $porcentaje = 0.5; //reparte el 50%

        if ($puntuaciones[$ganadores[0]] == 7.5) { // si los ganadores tienen 7.5
            $porcentaje = 0.8; // se reparte el 80%
        }

        $premioCadaUno = $apuesta * $porcentaje / count($ganadores); // importe a repartir dividido entre los ganadores

        foreach ($ganadores as $i) { // doy el premio a cada ganador
            $premios[$i] = $premioCadaUno;
        }
    }

    return $premios; // devuelvo el premio de cada jugador
}


function iniciales($nombre) { // saco las iniciales del nombre y apellido
    $iniciales = ""; // meto las letras
    foreach (explode(" ", $nombre) as $palabra) { //separo el nombre por espacio
        $iniciales .= strtoupper(substr($palabra, 0, 1));  //stroupper pasa a mayúscula
    } //substr coge la primera letra empezando desde el principio
    return $iniciales; // devuelve "LY"
}

function crearFichero($jugadores, $puntuaciones, $premios, $ganadores) {
    $nombreFichero = "apuestas_" . date("dmyHis") . ".txt"; // nombre con día, mes, año, hora, minutos y segundos
    $fichero = fopen($nombreFichero, "w"); // abro y creo el fichero para escribir

    foreach ($jugadores as $i => $nombre) { //una línea por jugador
        fwrite($fichero, iniciales($nombre) . "#" . $puntuaciones[$i] . "#" . $premios[$i] . "\n"); // nombre#puntos#premio
    }

    fwrite($fichero, "TOTAL PREMIOS#" . count($ganadores) . "#" . array_sum($premios)); // última línea con el resumen
    fclose($fichero); // cierro el fichero
    return $nombreFichero; //lo devuelvo para mostrar el nombre en la página
}

