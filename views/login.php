<?php
    require_once "../models/Conexao.php";
    require_once "../controllers/UsuarioController.php";

    session_start();

    if(isset($_POST["login"]) && isset($_POST["senha"])) {
        $usuarioController = new UsuarioController();
        $usuarioController->login($_POST["login"], $_POST["senha"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Tela de login</title>
</head>
<body>
    <div>
        <form method="POST">
            <h3>LOGIN</h3>
            
            <label>Email:</label>
            <input type="email">
            <label>Senha:</label>
            <input type="password">

            <?php
                if (isset($_SESSION["mensagem"])) {
            ?>
            <div class="alert alert-warning" role="alert">
                <strong>ERRO:</strong>
                <?php
                    echo $_SESSION["mensagem"];
                    # unset $_SESSION["mensagem"];
                ?>
            </div>
            <?php } ?>

            <input type="submit" id="button">
            <br><a href="../index.php">Início</a>
        </form>
    </div>
</body>
</html>