<?php
    include("class/Usuario.php");
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/editar.css">

    <title>Editar</title>
</head>

<body>
    <?php
        include_once('./components/header.php');
    ?>
    <?php

$p = new Usuario();
$p->buscarUsuario($_GET["pid"]);

echo "
    <form method='POST'>

    <label>Nome:</label>
    <input type='text' name='nome' minlength='3' value='" . $p->getNome() . "' required><br><br>

    <label>E-mail:</label>
    <input type='text' name='email' minlength='3' value='" . $p->getEmail() . " ' required><br><br>

    <label>Cidade:</label>
    <input type='text' name='cidade' minlength='3' value='" . $p->getCidade() . "' required><br><br>

    <input type='submit' name='atualizar' value='Atualizar'>
";

if ( isset($_REQUEST["atualizar"]) ) //evitar que o procedimento seja executado sem apertar o botão
{

    $p->setNome($_REQUEST["nome"]);
    $p->setEmail($_REQUEST["email"]);
    $p->setCidade($_REQUEST["cidade"]);

    echo $p->atualizarUsuario($_GET["pid"]) == true ? 
    "<p class='success'>Usuário atualizado.</p>" : 
    "<p class='error'>Ocorreu um erro.</p>";

}
?>
    <a class="editar" href="listaUsuario.php">Voltar</a>
    <?php
        include_once('./components/footer.php');
    ?>
</body>

</html>