<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Inserta Libro</h1>
    <div id="contenedor">
        <form action="./controlador/insertar.php" method="post">
            <div class="cajai">
                <div class="item">
                    <div class="pregunta">
                        <label for="idusuario">ID:
                        </label>
                    </div>
                    <div class="respuesta">
                        <input type="text" name="libro" id="idusuario" value="<?php if (isset($_POST['libro'])) echo $_POST['libro']; ?>" placeholder="Inserta un número">
                        <?php
                        if (isset($_POST['libro']) && empty($_POST['libro'])) {
                            echo "<p style='color: red'>Debes introducir un ID, por ej 01.</p>";
                        } ?>
                    </div>
                </div>
                <div class="item">
                    <div class="pregunta">
                        <label for="idtitulo">Titulo:
                        </label>
                    </div>
                    <div class="respuesta">
                        <input type="text" name="titulo" id="idusuario" value="<?php if (isset($_POST['titulo'])) echo $_POST['titulo']; ?>" placeholder="Inserta un nombre">
                        <?php
                        if (isset($_POST['titulo']) && empty($_POST['titulo'])) {
                            echo "<p style='color: red;'>Debes introducir el titulo del libro.</p>";
                        } ?>
                    </div>
                </div>
                <div class="item">
                    <div class="pregunta">
                        <label for="idautor">Autor:
                        </label>
                    </div>
                    <div class="respuesta">
                        <input type="text" name="autor" id="idautor" value="<?php if (isset($_POST['autor'])) echo $_POST['autor']; ?>" placeholder="Inserta un nombre">
                        <?php
                        if (isset($_POST['autor']) && empty($_POST['autor'])) {
                            echo "<p style='color: red'>Debes introducir un autor.</p>";
                        } ?>
                    </div>
                </div>
                <div class="item">
                    <div class="pregunta">
                        <label for="idpregunta">Paginas:
                        </label>
                    </div>
                    <div class="respuesta">
                        <input type="text" name="paginas" id="idpaginas" value="<?php if (isset($_POST['paginas'])) echo $_POST['paginas']; ?>" placeholder="Inserta un número">
                        <?php
                        if (isset($_POST['paginas']) && empty($_POST['paginas'])) {
                            echo "<p style='color: red;'>Debes introducir un nº de páginas.</p>";
                        } ?>
                    </div>
                </div>

                <div class="item">
                    <div class="pregunta">
                        <label for="idpregunta">
                        </label>
                    </div>
                    <div class="respuesta">
                        <input type="submit" name="enviar" id="idañadir" value="Añadir libro">
                        <a href="buscador.php">Buscar Libro</a>
                    </div>
                </div>
            </div>
            <div class="cajad">
                <div class="mostrar">
                    <?php
                    require("./modelo/clase_consulta.php");
                    require("./modelo/clase_conexion.php");
                    $conexion = new Consulta();
                    $resultado = $conexion->cargarProductos();
                    echo $resultado;
                    ?>
                </div>
            </div>

        </form>
    </div>

</body>

</html>