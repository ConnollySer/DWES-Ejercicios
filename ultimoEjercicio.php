<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php


        global $mensaje; 
        $mensaje = "Bienvenido al sitio web ";


        function mostrar_mensaje(){

            $mensaje = "Bienvenido al sitio web";
            $otro_mensaje = "bienvenidos al infierno";
            echo $otro_mensaje 
           . "<br> ";
            echo $mensaje;


        }

        mostrar_mensaje();
    ?>

</body>
</html>