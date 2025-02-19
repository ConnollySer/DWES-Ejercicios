<?php
/**
 * Este script permite buscar información de un Pokémon utilizando la PokeAPI.
 * El usuario ingresa el nombre o ID del Pokémon, y el script muestra su imagen y habilidades.
 *
 * @category   API
 * @package    PokeAPI
 * @author     Tu Nombre
 * @license    MIT
 * @version    1.0
 * @link       https://pokeapi.co/
 */

/**
 * Obtiene y muestra la información de un Pokémon específico.
 *
 * Esta función toma el nombre o ID de un Pokémon, realiza una solicitud a la PokeAPI,
 * y muestra la imagen y habilidades del Pokémon en una página web.
 *
 * @param string $pokemonNameOrId El nombre o ID del Pokémon a buscar.
 * @return void
 */
function getPokemonInfo($pokemonNameOrId)
{
    // Construye la URL de la API con el nombre o ID del Pokémon
    $url = "https://pokeapi.co/api/v2/pokemon/$pokemonNameOrId";

    // Realiza la solicitud a la API
    $json_data = @file_get_contents($url);

    // Verifica si la solicitud fue exitosa
    if ($json_data === FALSE) {
        echo "<p class='error'>No se encontró el Pokémon. Intenta con otro nombre o ID.</p>";
    } else {
        // Decodifica la respuesta JSON
        $data = json_decode($json_data, true);

        // Extrae la información del Pokémon
        $name = ucfirst($data['name']);
        $image = $data['sprites']['front_default'];
        $abilities = array_map(function ($ability) {
            return ucfirst($ability['ability']['name']);
        }, $data['abilities']);

        // Muestra la información del Pokémon
        echo "<div class='pokemon-info'>";
        echo "<h2>$name</h2>";
        echo "<img src='$image' alt='$name' class='pokemon-image'>";
        echo "<p><strong>Habilidades:</strong> " . implode(", ", $abilities) . "</p>";
        echo "</div>";
    }
}

// Verifica si se ha enviado un nombre o ID de Pokémon a través del formulario
if (isset($_GET['pokemon'])) {
    $pokemonNameOrId = strtolower($_GET['pokemon']);
    getPokemonInfo($pokemonNameOrId);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Pokémon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1 {
            color: #444;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .pokemon-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .pokemon-image {
            width: 150px;
            height: 150px;
            margin: 20px 0;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Buscador de Pokémon</h1>
<form method="GET" action="">
    <label for="pokemon">Nombre o ID del Pokémon:</label>
    <input type="text" id="pokemon" name="pokemon" placeholder="Ej: pikachu o 25" required>
    <button type="submit">Buscar</button>
</form>

</body>
</html>
