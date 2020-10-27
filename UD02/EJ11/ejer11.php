<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="muestra.php" method="get">
        <label for="idnombre">Nombre: </label>
        <input type="text" name="nombre" id="idnombre"><br/>
        <label for="idcolor">Color:</label>
        <select name="colores" id="idcolor">
            <option value="rojo">Rojo</option>
            <option value="verde">Verde</option>
            <option value="azul">Azul</option>
        </select><br/>
        <label for="idgenero">Genero:</label><br/>
        <input type="radio" name="genero" id="idmasculino" value="Masculino">Masculino
        <input type="radio" name="genero" id="idfemenino" value="Femenino">Femenino<br/>
        <input type="submit" value="Enviar" id="idenviar" name="submit">
    </form>
    
</body>
</html>