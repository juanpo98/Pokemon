<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <header>
      <a href="registro.php">Registrar</a>
    </header>

    <main>
      <h3>POKEDEX</h3>
      <img src="IMG/Logo.png">
      <div class="for">
        <form action="home.php" method="post">
          <h5>Email</h5>
          <input class="pas" type="text" name="email" required>
          <h5>Contraseña</h5>
          <input class="pas" type="password" name="contraseña" required><br><br>
          <input class="en" type="submit">
        </form>
      </div>
      
    </main>
    

    <?php
        $servidor = "localhost";
        $nombre = "root";
        $contra = "";
        $db = "pokeapi";
        
        try {
            $conn = new PDO("mysql:host=$servidor;dbname=$db", $nombre,  $contra);
   
        }
          catch(Exception $e) {
            echo ("No se pudo conectar");
        }    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $email = $_POST["email"];
              $contraseña = $_POST["contraseña"];
              $query = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$contraseña'";
              $resultado = $conexion->query($query);
              if ($resultado->n > 0) {
                echo "Inicio de sesión exitoso";
              } else {
               echo "Contraseña o correo incorrecto";
              }
          }
    ?>

</body>
</html>