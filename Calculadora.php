<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>

</head>
<body>

    <h2>Claculadora <h2>
    <br>
    
    <form method="post">
        <input type="number" class="numero" name="numero1" placeholder="Introduce la 1º cifra" required>
        <br><br>
        <select class="numero" name="seleccion" id="select">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Producto</option>
            <option value="/">División</option>
        </select>   
        <br><br>
        <input type="number" class="numero" name="numero2" placeholder="Introduce la 2º cifra" required>
        <br><br>
        <input type="submit" class="resultado" id="resul" name="bresultado" value="Calcular">
    </form>

    <?php 
    if (isset($_POST['bresultado'])){
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        $operacion = $_POST['seleccion'];
        $resultado = "";

        if($operacion == "+"){
            $resultado = $numero1 + $numero2;
        } elseif($operacion == "-"){
            $resultado = $numero1 - $numero2;
        } elseif($operacion == "*"){
            $resultado = $numero1 * $numero2;
        } elseif($operacion == "/"){
            if($numero2 == 0){
                $resultado = "No se puede dividir entre 0";
            } else {
                $resultado = $numero1 / $numero2;
            }
        }
    }
    ?>
    <br>
    <input class="numero" type="text" value="<?php if(isset($resultado)) echo $resultado; ?>" placeholder="0" readonly>
    <br><br>
</body>
</html>
