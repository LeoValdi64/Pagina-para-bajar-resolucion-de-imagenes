<?php
if (isset($_FILES['imagenes']) && count($_FILES['imagenes']['error']) > 0) {
    // Dimensiones máximas deseadas
    $maxAnchura = 800;
    $maxAltura = 600;

    foreach ($_FILES['imagenes']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            // Ruta temporal del archivo subido
            $archivoTemporal = $_FILES['imagenes']['tmp_name'][$key];

            // Nombre original del archivo
            $nombreArchivo = $_FILES['imagenes']['name'][$key];

            // Crear una nueva imagen desde el archivo subido
            $imagenOriginal = imagecreatefromjpeg($archivoTemporal); // Ajusta esto según el tipo de imagen

            // Obtener dimensiones originales
            list($anchuraOriginal, $alturaOriginal) = getimagesize($archivoTemporal);

            // Calcular la relación de aspecto
            $ratioOriginal = $anchuraOriginal / $alturaOriginal;

            // Calcular nuevas dimensiones manteniendo la relación de aspecto
            $nuevaAnchura = $maxAnchura;
            $nuevaAltura = $maxAltura;
            if ($nuevaAnchura / $nuevaAltura > $ratioOriginal) {
                $nuevaAnchura = $nuevaAltura * $ratioOriginal;
            } else {
                $nuevaAltura = $nuevaAnchura / $ratioOriginal;
            }

            // Crear imagen redimensionada
            $imagenRedimensionada = imagecreatetruecolor($nuevaAnchura, $nuevaAltura);
            imagecopyresampled($imagenRedimensionada, $imagenOriginal, 0, 0, 0, 0, $nuevaAnchura, $nuevaAltura, $anchuraOriginal, $alturaOriginal);

            // Guardar la imagen redimensionada
            imagejpeg($imagenRedimensionada, 'low_img/low_' . $nombreArchivo);

            // Liberar memoria
            imagedestroy($imagenOriginal);
            imagedestroy($imagenRedimensionada);

            echo "Imagen " . $nombreArchivo . " procesada y guardada.<br>";
        }
    }
} else {
    echo "Error al subir las imágenes.";
}
?>
