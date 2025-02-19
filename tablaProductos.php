<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$indice = 'productos.txt';

if (file_exists($indice)) {

    $lineas = file($indice);

    echo "<table border='1'>";
    echo "<tr><th>Nombre del Producto</th><th>Precio</th></tr>";
    foreach ($lineas as $linea) {
       
        list($nombre, $precio) = explode(',', $linea);

        echo "<tr><td>" . htmlspecialchars($nombre) . "</td><td>" . htmlspecialchars($precio) . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "El archivo no existe o está vacío.";
}
?>

</body>
</html>
