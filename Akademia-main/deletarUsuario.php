<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/deletar.css">
    <title>Excluir - Usuario</title>
</head>

<body>
    <!-- Header da página -->
    <?php include_once('./components/header.php'); ?>

    <!-- Container da mensagem de exclusão e botão "Voltar" -->
    <div class="delete-container">
        <?php
            include_once("class/Usuario.php");
            $p = new Usuario();
            $p->excluirUsuario($_GET["id"]);
            echo "<p class='message'>Usuário excluído com sucesso!</p>";
        ?>

        <a class="delete" href="listaUsuario.php">Voltar</a>
    </div>

    <!-- Footer da página -->
    <?php include_once('./components/footer.php'); ?>
</body>

</html>