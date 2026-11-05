<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyecto Tema 5 PHP - Desarrollo de aplicaciones web</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Inter:wght@400;500;600;700;800&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../webroot/css/styles.css">
  <link rel="stylesheet" href="webroot/css/estilos.css">
  <style>
    .contenedor-botones {
        display: flex;
        flex-direction: column;
        gap: 8px;
        align-items: center;
        justify-content: center;
    }

    .contenedor-botones .btn {
        margin: 0;
        width: 100%;
        box-sizing: border-box;
        white-space: nowrap;
        text-align: center;
        font-size: 0.9em;
        padding: 8px 12px;
    }
  </style>
</head>
<body class="pagina-ajustada">
  <!-- Bloque: Cabecera -->
  <header id="site-header" class="cabecera">
    <div class="cabecera__contenedor">
      <img class="monograma" src="../webroot/images/cruz.png" alt="">
      <h1 class="titulo-header">TEMA 5: Desarrollo de aplicaciones web</h1>
      <img class="monograma" src="../webroot/images/cruz.png" alt="">
    </div>
  </header>

  <main>
    <div class="container">
        <a href='../MDCDWESProyectoDWES/indexProyectoDWES.php'>⬅ Volver al inicio</a><hr>
        <p>Panel de control de ejercicios</p>

        <table>
            <thead>
                <tr>
                    <th>Ficheros auxiliares</th>
                    <th>Mostrar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CreaDBMDCProyectoTema5</td>
                    <td><a href="mostrarCodigo/muestraScriptCrea.php" class="btn btn-codigo">Código</a></td>
                </tr>
                <tr>
                    <td>CargaInicialDBMDCProyectoTema5</td>
                    <td><a href="mostrarCodigo/muestraScriptCarga.php" class="btn btn-codigo">Código</a></td>
                </tr>
                <tr>
                    <td>BorraDBMDCProyectoTema5</td>
                    <td><a href="mostrarCodigo/muestraScriptBorrar.php" class="btn btn-codigo">Código</a></td>
                </tr>
                <tr>
                    <td>configDBPDO</td>
                    <td><a href="mostrarCodigo/muestraConfigDBPDO.php" class="btn btn-codigo">Código</a></td>
                </tr>
                <tr>
                    <td>libreriaValidacion</td>
                    <td><a href="mostrarCodigo/muestraLibreriaValidacion.php" class="btn btn-codigo">Código</a></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Enunciado de la Práctica</th>
                    <th colspan="2">PDO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>Mostrar el contenido de las variables superglobales y phpinfo()</td>
                    <td><a href="codigoPHP/ejercicio01PDO.php" class="btn btn-ejecutar">Ejecutar</a></td>
                    <td><a href="mostrarCodigo/muestraEjercicio01PDO.php" class="btn btn-codigo">Código</a></td>
                </tr>
                
                <tr>
                    <td>1</td>
                    <td>Desarrollo de un control de acceso con identificación del usuario basado en la función header()</td>
                    <td><a href="" class="btn btn-ejecutar">Ejecutar</a></td>
                    <td><a href="" class="btn btn-codigo">Código</a></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td>2</td>
                    <td>Desarrollo de un control de acceso con identificación del usuario basado en la función header() y en el uso de una tabla “Usuario” de la base de datos. (PDO)</td>
                    <td><a href="" class="btn btn-ejecutar">Ejecutar</a></td>
                    <td><a href="" class="btn btn-codigo">Código</a></td>
                </tr>               
            </tbody>
        </table>
    </div>
  </main>

  <!-- Bloque: Pie -->
  <footer class="pie">
    <div class="pie__redes">
      <a class="pie__red" href="https://github.com/moisesdcsauces/MDCDWESProyectoTema5" target="_blank" rel="noopener" aria-label="GitHub">
        <img src="../webroot/images/icons/github.png" alt="">
      </a>
      <a class="pie__red" href="https://www.linkedin.com/in/mois%C3%A9s-alberto-dom%C3%ADnguez-cruz/" target="_blank" rel="noopener" aria-label="LinkedIn">
        <img src="../webroot/images/icons/linkedin.png" alt="">
      </a>
    </div>
      <p class="pie__texto">© <a class="titulo-enlace" href="../index.html"> Moisés Alberto Domínguez Cruz</a> - IES Los Sauces<span id="year"></span></p>
  </footer>

  <script src="../webroot/js/main.js" defer></script>
</body>
</html>