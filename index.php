<!DOCTYPE html>
<html>

<head>
    <title>Subir Imágenes</title>
</head>

<body>
    <form action="procesar_imagen.php" method="post" enctype="multipart/form-data">
        <p>Selecciona imágenes para cambiar su resolución:</p>
        <input type="file" name="imagenes[]" id="imagenes" multiple>
        <input type="submit" value="Subir Imágenes" name="submit">
    </form>

</body>

</html>