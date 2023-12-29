<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="CSS/lista.css">
</head>
<body>

<?php
        $url = "https://pokeapi.co/api/v2/pokemon/";
            $offset = 0; 
            $limit = 42; 
        if (isset($_POST['offset'])) {
            $offset = $_POST['offset'];
        }
        $Lista = file_get_contents("$url?offset=$offset&limit=$limit");
        $Lista = json_decode($Lista, true);



        foreach ($Lista['results'] as $pokemon) {
            $pokemonDe = file_get_contents($pokemon['url']);
            $pokemonDe = json_decode($pokemonDe, true);
            $pokemonId = $pokemonDe['id'];


                echo "<form action='detalle.php' method='post'>";
                    echo "<div class='todosl-pokemon'>";
                        echo "<button type='submit' name='pokemon_name' value='{$pokemon['name']}'>{$pokemon['name']}</button>";
                        echo "<input type='hidden' name='pokemon_id' value='$pokemonId'>";
                    echo "</div>";
                echo "</form>";

            
        }

        
        echo "<form action='' method='post' class='bom'>";
        echo "<input type='hidden' name='offset' value='" . ($offset + $limit) . "'>";
        echo "<button>Mas</button>";
        echo "</form>";

    if($offset >=20){
        echo "<form action='' method='post' class='bon'>";
        echo "<input type='hidden' name='offset' value='" . ($offset - $limit) . "'>";
        echo "<button>Menos</button>";
        echo "</form>";
    }


?>

        <header>
            <a href="index.php">Regresar</a>
        </header>

</body>
</html>
