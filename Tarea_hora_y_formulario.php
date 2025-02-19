<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>La hora actual es: 
    <?php
    $horaActual = new DateTime("now", new DateTimeZone('Europe/Madrid'));
    echo $horaActual->format('g:i:s A') . '<br>'; 
    ?>
    </h4>

    <form method="POST">
        <input type="text" name="nombre" placeholder="Introduce tu nombre">
        <input type="submit" value="Saludar">
    </form>
    <?php
        if ($_POST['nombre'] ) {
        echo "<p>Hola  " . htmlspecialchars($_POST['nombre'] ) . 
        "</p>";
         }
    ?>

</body>
</html>
