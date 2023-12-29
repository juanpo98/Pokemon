<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <h4>Registro de Usuario</h4>
    <main>
        <div class="for">
            <form method="post">
                <h5>Email</h5>
                <input class="pas" type="text" name="email" required>
                <h5>Contraseña</h5>
                <input class="pas" type="password" name="contrasena" required>
                <input class="en2" type="submit" value="Registrar">
            </form>
        </div>


        <p class="tex" >Esta apartado solo sirve para registrase.<br><br> Si quiere regresar e iniciar
            seccion oprima este<br> boton</p>

        <header class="header2">
        <div class="men">
            <a href="index.php">Iniciar Seccion</a>
        </div>
        </header>

    </main>

    <?php
    $servidor = "localhost";
    $nombre = "root";
    $contra = "";
    $db = "pokeapi";

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$db", $nombre, $contra);
    } catch (Exception $e) {
        echo "Error";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $contraseña = $_POST["contrasena"];

        try {      
            $cons = $conn->prepare("INSERT INTO usuarios (email, contraseña) VALUES (:email, :contrasena)");
            $cons->bindParam(':email', $email);
            $cons->bindParam(':contrasena', $contraseña);
            $cons->execute();

            echo"Registro exitoso";
        } catch (Exception $e) {
            echo "Error";
        }
    }
    ?>
</body>
</html>
