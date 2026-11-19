<?php
include 'media7fun.php'; //importo las funciones
set_error_handler('customError'); //por si hay errores.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numCartas = $_POST["cartas"];//recojo el campo "cartas" del formulario (cartas por jugador)
    $apuesta = $_POST["apuesta"]; //recojo el campo "apuesta" del formulario (importe de la ronda)

    $jugadores = crearJugadores($_POST); // paso todo $_POST porque la función necesita los 4 campos de nombre (jugador1...jugador4)
    $baraja = crearBaraja();
    $manos = repartirCartas($jugadores, $baraja, $numCartas);

    $puntuaciones = calcularPuntuaciones($manos);
    $ganadores = obtenerGanadores($puntuaciones);
    $premios = calcularPremios($puntuaciones, $ganadores, $apuesta);

    $nombreFichero = crearFichero($jugadores, $puntuaciones, $premios, $ganadores);
}

?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado de la partida — Siete y Media</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: #f2f6f8;
            color: #172c42;
            font-family: Arial, Helvetica, sans-serif
        }

        .shell {
            max-width: 1100px;
            margin: 28px auto;
            padding: 0 20px
        }

        .banner {
            background: linear-gradient(115deg, #075c48, #0c8c6b);
            color: #fff;
            padding: 25px 30px;
            border-radius: 15px 15px 0 0
        }

        .banner h1 {
            margin: 0 0 6px;
            font-size: 30px
        }

        .banner p {
            margin: 0;
            opacity: .9
        }

        .panel {
            background: white;
            border: 1px solid #dbe5eb;
            border-radius: 13px;
            box-shadow: 0 8px 24px #142c3a10;
            padding: 24px;
            margin: 20px 0
        }

        .panel h2 {
            margin: 0 0 19px;
            font-size: 21px;
            color: #075c48
        }

        .notice {
            padding: 17px 20px;
            border: 1px solid #a8dec1;
            background: #eaf9f0;
            color: #08633b;
            border-radius: 10px;
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 16px
        }

        .notice.bad {
            background: #fff6e9;
            border-color: #eed4a4;
            color: #8d4b12
        }

        .score {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px
        }

        .score th {
            background: #e9f2f5;
            color: #143d50;
            text-align: left;
            padding: 12px
        }

        .score td {
            border-bottom: 1px solid #e3ebf0;
            padding: 12px;
            vertical-align: middle
        }

        .score tr.win {
            background: #edfaf2
        }

        .cards {
            display: flex;
            gap: 5px;
            flex-wrap: wrap
        }

        .playing {
            width: 43px;
            height: 62px;
            border: 1px solid #cbd5dc;
            border-radius: 6px;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px #0001;
            font-weight: bold;
            font-size: 17px
        }

        .red {
            color: #d12c3b
        }

        .black {
            color: #1e2c38
        }

        .playing span {
            font-size: 22px
        }

        .total {
            font-weight: bold;
            color: #086b45
        }

        .file {
            margin-top: 15px;
            background: #f5f8fa;
            border: 1px solid #dce5ea;
            border-radius: 9px;
            padding: 15px
        }

        .file strong {
            display: block;
            margin-bottom: 10px
        }

        .file pre {
            font-size: 13px;
            line-height: 1.55;
            margin: 0;
            white-space: pre-wrap;
            font-family: Consolas, monospace
        }

        .back {
            display: inline-block;
            text-decoration: none;
            border-radius: 7px;
            background: #07845e;
            color: white;
            padding: 12px 20px;
            font-weight: bold
        }

        .tablewrap {
            overflow-x: auto
        }
    </style>
</head>

<body>
    <main class="shell">
        <header class="banner">
            <h1>🂡 Juego de las Siete y Media</h1>
            <p>Reto 2.2 · Resultado de la partida</p>
        </header>
        <section class="panel">

            <h2>Cartas y puntuaciones</h2>
            <?php
            echo "<table class='score'>"; //abro la tabla concomillas simples dentro para no cerrar el echo
            echo "<tr><th>Jugador</th><th>Cartas</th><th>Puntos</th><th>Premio</th></tr>"; // fila de cabecera, se escribe una sola vez
            
            foreach ($jugadores as $i => $nombre) { // una fila por jugador ($i es su posición: 0, 1, 2, 3)
                echo "<tr>"; // abro la fila del jugador
                echo "<td>$nombre</td>"; // celda con su nombre
            
                echo "<td>"; // abro la celda de las cartas fuera del foreach, para que sea una sola celda
                foreach ($manos[$i] as $carta) { //recorro las cartas de la mano de ese jugador
                    echo $carta["valor"] . $carta["tipo"] . " "; // valor + tipo + espacio, por ejemplo "7C "
                }
                echo "</td>"; // cierro la celda de las cartas
            
                echo "<td>{$puntuaciones[$i]}</td>"; // sus puntos (las llaves son necesarias al usar un array dentro de comillas dobles)
                echo "<td>{$premios[$i]} €</td>"; //su premio (0 si no ha ganado)
                echo "</tr>"; //cierro la fila y pasa al siguiente jugador
            }
            echo "</table>"; //cierro la tabla pero fuera del bucle, una sola vez
            
            if (count($ganadores) > 0) { //si hay algún ganador
                foreach ($ganadores as $i) { //recorro los ganadores (guarda posiciones, por eso $i y no $nombre)
                    echo "<p>Ganador: {$jugadores[$i]} con {$puntuaciones[$i]} puntos. Premio: {$premios[$i]} €</p>"; // con su posición saco nombre, puntos y premio
                }
            } else { //si todos se han pasado de 7.5
                echo "<p>No hay ganador. El importe de $apuesta € se convierte en bote.</p>"; // la apuesta pasa a ser bote
            }
            ?>

            <h2 style="margin-top:25px">Fichero generado</h2>
            <?php
            echo "<p>$nombreFichero</p>"; // nombre del fichero que devuelve crearFichero
            echo "<pre>" . file_get_contents($nombreFichero) . "</pre>"; // leo el fichero y lo muestro. el <pre> lo que hace es enseñar el texto tal cual está escrito (con sus saltos de línea y los espacios)
            ?> 

            <p style="margin-top:22px"><a class="back" href="media7.html">← Volver al formulario</a></p>
        </section>
    </main>
</body>

</html>