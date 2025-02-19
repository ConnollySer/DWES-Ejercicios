<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de la compra</title>
</head>
<body>

    <h1>Lista de la compra</h1>

    <form action="#" method="post">
        <h2>Cosas que faltan <input type="text" name="lista" id="lista" required></h2>
        <button type="submit" name="nuevaLista" id="boton">Agregar</button>
    </form>
    <h3>Por comprar:</h3>
    <ul>
        <li>
        <?php
        $file = 'listaCompra.txt';

        if (!file_exists($file)) {
            echo "El archivo no existe.";
        } else {
            $filesize = filesize($file);
            if ($filesize > 0) {
                $fp = fopen($file, "r+");
                $contenido = fread($fp, $filesize);
                fclose($fp);

                echo nl2br($contenido); 
            } else {
                echo "El archivo está vacío.";
            }
        }

        if (isset($_POST['nuevaLista'])) {
            $nuevaLista = htmlspecialchars($_POST['lista']);
            if (!empty($nuevaLista)) {
                file_put_contents($file, $nuevaLista . PHP_EOL, FILE_APPEND);
            } else {
                echo "Por favor, ingresa un ítem válido.";
            }
        }
        ?>
        </li>
    </ul>
    
</body>
</html>
