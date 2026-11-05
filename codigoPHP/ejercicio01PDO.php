<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 00 - Variables Superglobales y phpinfo()</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Inter:wght@400;500;600;700;800&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../webroot/css/styles.css">
        <link rel="stylesheet" href="../webroot/css/estilos.css">

        <style>
            .enlace-volver {
                color: #474a8a;
                font-weight: bold;
                text-decoration: none;
                display: inline-block;
                margin-bottom: 20px;
            }

            .container {
                display: block;
                margin: 0 auto;
                background: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.05);
                max-width: 950px;
                width: 100%;
                text-align: left;
            }

            .container h2 {
                color: #777bb4;
                margin-top: 30px;
                margin-bottom: 15px;
                border-bottom: 2px solid #e9ecef;
                padding-bottom: 10px;
            }

            .container h3 {
                color: #474a8a;
                margin-top: 25px;
            }

            table.tabla-superglobales {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
                margin-bottom: 30px;
            }

            table.tabla-superglobales th, table.tabla-superglobales td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            table.tabla-superglobales th {
                background-color: #777bb4;
                color: white;
                font-weight: bold;
            }

            table.tabla-superglobales tr:nth-child(even) {
                background-color: #f8f9fc;
            }

            .vacio {
                color: #999;
                font-style: italic;
                padding: 10px;
                background-color: #f8f9fc;
                border-radius: 4px;
                margin-bottom: 20px;
            }

            .btn-phpinfo {
                display: inline-block;
                background-color: #474a8a;
                color: white;
                padding: 12px 20px;
                text-decoration: none;
                font-weight: bold;
                border-radius: 4px;
                margin-top: 10px;
                margin-bottom: 20px;
                text-align: center;
            }
            .btn-phpinfo:hover {
                background-color: #363970;
            }
        </style>
    </head>
    <body class="pagina-ajustada">
        <header id="site-header" class="cabecera">
            <div class="cabecera__contenedor">
                <img class="monograma" src="../../webroot/images/cruz.png" alt="">
                <h1 class="titulo-header">TEMA 5: Desarrollo de Aplicaciones Web (Entorno de Trabajo)</h1>
                <img class="monograma" src="../../webroot/images/cruz.png" alt="">
            </div>
        </header>

        <main>
            <section>
                <div class="container">
                    <!--
                    -- Moisés Alberto Dominguez Cruz
                    -- 05/11/2026
                    -- Ejercicio 00 (Tema 5). Mostrar el contenido de las variables superglobales y phpinfo().
                    -->
                    <a href='../indexProyectoTema5.php' class='enlace-volver'>⬅ Volver al inicio</a>
                    <hr>

                    <?php
                    // Iniciamos sesion y creamos sesiones de prueba para que se visualicen
                    session_start();
                    $_SESSION['usuario_prueba'] = 'Moises_Alberto';
                    $_SESSION['perfil'] = 'administrador';

                    // PHPINFO()
                    echo "<h2>1. Informacion de phpinfo</h2>";
                    echo "<p>Mediante la funcion <code>phpinfo()</code> se obtiene informacion detallada sobre la configuración actual de PHP en el servidor.</p>";
                    echo "<a href='?ver_phpinfo=1' target='_blank' class='btn-phpinfo'>Ejecutar y ver phpinfo() completo en nueva pestaña</a>";

                    if (isset($_GET['ver_phpinfo'])) {
                        phpinfo();
                        exit;
                    }

                    // RECORRIDO DE TODAS LAS SUPERGLOBALES CON FOREACH
                    echo "<h2>3. Recorrido exhaustivo de todas las Superglobales con foreach()</h2>";

                    // Array asociativo que agrupa todas las variables superglobales de PHP
                    $aSuperglobales = [
                        '\$_SERVER'  => $_SERVER,
                        '\$_REQUEST' => $_REQUEST,
                        '\$_GET'     => $_GET,
                        '\$_POST'    => $_POST,
                        '\$_FILES'   => $_FILES,
                        '\$_COOKIE'  => $_COOKIE,
                        '\$_SESSION' => isset($_SESSION) ? $_SESSION : [],
                        '\$_ENV'     => $_ENV
                    ];

                    // Recorrido del array maestro
                    foreach ($aSuperglobales as $nombreSuperglobal => $arraySuperglobal) {
                        echo "<h3>Contenido de $nombreSuperglobal</h3>";

                        if (!empty($arraySuperglobal)) {
                            echo "<table class='tabla-superglobales'>";
                            echo "<tr><th>Clave (Key)</th><th>Valor (Value)</th></tr>";
                            
                            foreach ($arraySuperglobal as $clave => $valor) {
                                if (is_array($valor)) {
                                    $valor = "<pre>" . print_r($valor, true) . "</pre>";
                                }
                                echo "<tr>";
                                echo "<td><strong>$clave</strong></td>";
                                echo "<td>$valor</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "<div class='vacio'>La variable $nombreSuperglobal está vacía en este momento.</div>";
                        }
                    }
                    ?>
                </div>
            </section>
        </main>

        <footer class="pie">
            <div class="pie__redes">
                <a class="pie__red" href="../indexProyectoTema5.php" title="Ir al índice del Tema 5" aria-label="Ir al índice del Tema 5">
                    <img src="../../webroot/images/icons/casa.png" alt="">
                </a>
                <a class="pie__red" href="https://github.com/moisesdcsauces/MDCDWESProyectoTema5" target="_blank" rel="noopener" aria-label="GitHub">
                    <img src="../../webroot/images/icons/github.png" alt="">
                </a>
                <a class="pie__red" href="https://www.linkedin.com/in/mois%C3%A9s-alberto-dom%C3%ADnguez-cruz/" target="_blank" rel="noopener" aria-label="LinkedIn">
                    <img src="../../webroot/images/icons/linkedin.png" alt="">
                </a>
            </div>
            <p class="pie__texto">© <a class="titulo-enlace" href="../../index.html"> Moisés Alberto Domínguez Cruz</a> - IES Los Sauces<span id="year"></span></p>
        </footer>
        
        <script src="../../webroot/js/main.js" defer></script>
    </body>
</html>