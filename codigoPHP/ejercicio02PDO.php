<<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 02 - Desarrollo de un control de acceso</title>
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

            .mensaje-exito {
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                border-radius: 4px;
                border: 1px solid #c3e6cb;
                margin-top: 20px;
            }

            .error {
                background-color: #f8d7da;
                color: #721c24;
                padding: 12px;
                border-radius: 4px;
                border: 1px solid #f5c6cb;
            }
        </style>
    </head>
    <body class="pagina-ajustada">
        <header id="site-header" class="cabecera">
            <div class="cabecera__contenedor">
                <img class="monograma" src="../../webroot/images/cruz.png" alt="">
                <h1 class="titulo-header">TEMA 5: Desarrollo de Aplicaciones Web</h1>
                <img class="monograma" src="../../webroot/images/cruz.png" alt="">
            </div>
        </header>

        <main>
            <section>
                <div class="container">
                    <!--
                    -- Moisés Alberto Dominguez Cruz
                    -- 08/11/2026
                    -- Ejercicio 02 (Tema 5). Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de una tabla “Usuario” de la base de datos. (PDO)
                    -->
                    <a href='../indexProyectoTema5.php' class='enlace-volver'>⬅ Volver al inicio</a>
                    <hr>

                    <?php
                    // Comprobamos si el navegador ha enviado las credenciales
                    if (!isset($_SERVER['PHP_AUTH_USER'])) {
                        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                        header('HTTP/1.0 401 Unauthorized');
                        echo "Usuario no reconocido!";
                        exit;
                    }

                    // Archivo con las variables de conexion a la base de datos
                    require_once '../config/configDBPDOCasa.php';

                    try {
                        // Instanciacion del objeto PDO para conectar a la base de datos
                        $miDB = new PDO(HOST, USER, PASS);

                        // Consulta SQL preparada para comprobar las credenciales en la tabla T01_Usuario
                        $sql = "SELECT * FROM T01_Usuario WHERE T01_CodUsuario = :usuario AND T01_Password = sha2(:passwd, 256)";

                        $resultado = $miDB->prepare($sql);
                        
                        // Ejecutamos pasando el array
                        $resultado->execute([
                            ':usuario' => $_SERVER['PHP_AUTH_USER'],
                            ':passwd'  => $_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'] // concatenacion del usuario y contraseña. En la insercion a la base de datos se tiene que concatenar.
                        ]);

                        // Recuperamos el registro
                        $usuarioBD = $resultado->fetch();

                        // Si el usuario no existe en la base de datos, denegamos el acceso de nuevo
                        if (!$usuarioBD) {
                            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
                            header('HTTP/1.0 401 Unauthorized');
                            echo "Usuario o contraseña incorrectos!";
                            exit;
                        }

                        // Si las credenciales son correctas, mostramos el panel privado
                        echo "<h2>Panel de Control - Acceso Autorizado</h2>";
                        echo "<div class='mensaje-exito'>";
                        echo "<h3>¡Bienvenido/a, " . htmlspecialchars($usuarioBD['T01_DescUsuario']) . "!</h3>";
                        echo "<p><strong>Codigo de usuario:</strong> " . htmlspecialchars($usuarioBD['T01_CodUsuario']) . "</p>";
                        echo "<p><strong>Perfil:</strong> " . htmlspecialchars($usuarioBD['T01_Perfil']) . "</p>";
                        echo "<p><strong>Numero de conexiones:</strong> " . htmlspecialchars($usuarioBD['T01_NumConexiones']) . "</p>";
                        echo "</div>";

                    } catch (PDOException $miExcepcionPDO) {
                        // Captura de errores de PDO
                        echo '<div class="error">';
                        echo '<h3 style="margin-top:0;">Error en la autenticación.</h3>';
                        echo 'Código del error: ' . $miExcepcionPDO->getCode() . '<br/>';
                        echo 'Mensaje de error: ' . $miExcepcionPDO->getMessage();
                        echo '</div>';
                        exit;
                    } finally {
                        // Cierre de la conexion a la base de datos
                        unset($miDB);
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