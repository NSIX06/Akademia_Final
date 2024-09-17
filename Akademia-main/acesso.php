<?php
    include_once('./class/Usuario.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap"
        rel="stylesheet">

    <title>Akademia - Área Restrita</title>
</head>

<body>
    <?php
        include_once('./components/header.php');
    ?>

    <main class="mainAcesso">
        <?php
            echo "<span class='mensagemAcesso'>Seja bem vindo, " . $_COOKIE['nome'] . "!</span>";
        ?>

        <div>
            <a href="./listaUsuario.php" class="botaoPrimario">Lista de Usuários</a>
            <a href="./cadastrarModalidade.php" class="botaoPrimario">Cadastro de modalidades</a>
        </div>
    </main>

    <?php
        include_once('./components/footer.php');
    ?>
</body>