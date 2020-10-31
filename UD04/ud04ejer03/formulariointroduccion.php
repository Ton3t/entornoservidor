<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Dar de alta Artículos</h1>

    <form action="resultadoinsertar.php" method="post">
        <div class="cajai">
            <span>Sección del artículo: </span><br>
            <span>Nombre del artículo: </span><br>
            <span>Precio del artículo: </span><br>
            <span>Pais del artículo: </span><br>
        </div>
        <div class="cajad">
            <input type="text" name="seccion" id="idarticulo" class="button" placeholder="Sección del Artículo" required><br>
            <input type="text" name="articulo" id="idnombre" class="button" placeholder="Nombre del artículo" required><br>
            <input type="number" name="precio" id="idprecio" class="button" placeholder="Número" required><br>
            <input type="text" name="paisorigen" id="idorigen" class="button" placeholder="País" required><br>
        </div>
        <div class="botones">
            <div class="item">
            <input type="submit" value="Insertar" id="idinsertar">

            </div>
            <div class="item">
            <a href="formulariobusqueda.php" id="idlink">Buscar Artículo</a>

            </div>
        </div>

    </form>
</body>

</html>