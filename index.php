<?php
// Definir el nombre del archivo y la nueva resolución
$nombreArchivo = 'img/img(1).jpg';
$nuevaAnchura = 800;
$nuevaAltura = 600;

// Cargar la imagen original
$imagenOriginal = imagecreatefromjpeg($nombreArchivo);

// Obtener las dimensiones originales
list($anchuraOriginal, $alturaOriginal) = getimagesize($nombreArchivo);

// Crear una nueva imagen con la resolución deseada
$imagenRedimensionada = imagecreatetruecolor($nuevaAnchura, $nuevaAltura);

// Copiar y redimensionar la imagen original en la nueva imagen
imagecopyresampled($imagenRedimensionada, $imagenOriginal, 0, 0, 0, 0, $nuevaAnchura, $nuevaAltura, $anchuraOriginal, $alturaOriginal);

// Guardar la nueva imagen
imagejpeg($imagenRedimensionada, 'low_img/low_img(1).jpg');

// Liberar memoria
imagedestroy($imagenOriginal);
imagedestroy($imagenRedimensionada);
?>
