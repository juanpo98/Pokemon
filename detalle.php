<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <link rel="stylesheet" href="CSS/detalle.css">
</head>
<body>

        <header>
            <a href="home.php">Regresar</a>
        </header>

        <?php

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {        

                    $pokemonId = $_POST['pokemon_id'];
                    $pokemonName = $_POST['pokemon_name'];
                    echo "<h1>Detalles de $pokemonName</h1>";
                    echo "<p>ID: $pokemonId</p>";
                    echo "<p>Nombre: $pokemonName</p>";
                } else {
                    echo "Error";
                }
            /* ---------------------------- */
            /* ---------------------------- */

            $pokemon = $pokemonId;
            $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
            curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($api);
            curl_close($api);
            $json = json_decode($response);
    
            echo '<h2>HABILIDADES</h2>';
            foreach($json->abilities as $k => $v) {
                echo $v->ability->name.'<br>';
            }
    
            echo '<h2>TIPO</h2>';
            echo $json->types[0]->type->name;
            echo"<br><br>";
            echo '<img src="'.$json->sprites->back_default.'" width="250">';
            echo '<img src="'.$json->sprites->front_default.'" width="250">';

        ?>


       
</body>
</html>